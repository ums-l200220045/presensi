const officeLat = -7.550099;
const officeLng = 110.769895;
const allowedRadius = 100; // 100 meter

function getDistance(lat1, lon1, lat2, lon2) {
    const R = 6371e3;
    const toRad = (deg) => (deg * Math.PI) / 180;
    const dLat = toRad(lat2 - lat1);
    const dLon = toRad(lon2 - lon1);
    const a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(toRad(lat1)) *
            Math.cos(toRad(lat2)) *
            Math.sin(dLon / 2) *
            Math.sin(dLon / 2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    return R * c;
}

function checkLocationAndProceed(callback) {
    if (!navigator.geolocation) {
        alert("Browser tidak mendukung Geolocation");
        return;
    }

    navigator.geolocation.getCurrentPosition(
        (position) => {
            const userLat = position.coords.latitude;
            const userLng = position.coords.longitude;
            const distance = getDistance(
                userLat,
                userLng,
                officeLat,
                officeLng
            );

            if (distance <= allowedRadius) {
                callback();
            } else {
                alert("Kamu berada di luar area absensi!");
            }
        },
        (error) => {
            alert("Gagal mendapatkan lokasi: " + error.message);
        }
    );
}

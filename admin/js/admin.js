document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('userCountButton').addEventListener('click', function() {
        fetch('php/load_user.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('cant_user').innerText = `Usuarios registrados: ${data}`;
            })
            .catch(error => console.error('Error:', error));
    });
});
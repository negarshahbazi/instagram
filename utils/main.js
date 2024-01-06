document.addEventListener('DOMContentLoaded', function () {
    const myPostElements = document.getElementsByClassName('myPost');

    Array.from(myPostElements).forEach(function (element) {
        element.addEventListener('click', function () {
            const imageUrl = element.src;
            document.getElementById('modalImage').src = imageUrl;
            $('#photoModal').modal('show');
        });
    });
});
document.getElementById('avatar').addEventListener('click',()=>{
    document.getElementById('avatarModal');
    $('#avatarModal').modal('show');
})
// post profil
document.addEventListener("DOMContentLoaded", function () {
  const myPostElements = document.getElementsByClassName("myPost");

  Array.from(myPostElements).forEach(function (element) {
    element.addEventListener("click", function () {
      const imageUrl = element.src;
      document.getElementById("modalImage").src = imageUrl;
      $("#photoModal").modal("show");
    });
  });
});

// post accueil
document.addEventListener("DOMContentLoaded", function () {
const myPostElements = document.getElementsByClassName("myPost");

Array.from(myPostElements).forEach(function (element) {
  element.addEventListener("click", function () {
    const imageUrl = element.src;
    document.getElementById("modalImage").src = imageUrl;
    $("#photoModal").modal("show");
  });
});
});

// change avatar
document.addEventListener("DOMContentLoaded", function () {
  const myAvatarElements = document.getElementById("avatar");

  myAvatarElements.addEventListener("click", function () {
    document.getElementById('avatarModal');
    $("#avatarModal").modal("show");
  });
});

// change la color de coeur sur modal like
document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM is ready");
  var likeButton = document.querySelector(".favorite");

  if (likeButton) {
    likeButton.addEventListener("click", function () {
      likeButton.style.color = "red";
      console.log("Button clicked");
      // Additional logic here
    });
  } else {
    console.log("Like button not found");
  }
});

let button = document.getElementById('photoModal');

function closeImage() {
    // Utiliser la méthode 'hide' pour fermer la modale
    let modal = new bootstrap.Modal(button);
    modal.hide();
    header('Location: ../pages/profil.php'); 
}


console.log(button);



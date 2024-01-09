// post
document.addEventListener("DOMContentLoaded", function () {
  const myPostElements = document.getElementsByClassName("myPost");

  Array.from(myPostElements).forEach(function (element) {
      element.addEventListener("click", function () {

          const postId = element.dataset.postId; // Retrieve post ID from data attribute
          document.getElementById("idPost").innerText = postId; // Display post ID

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

// change la color de coleur sur modal like
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


// comment modal
// document.addEventListener("DOMContentLoaded", function () {
//   const commentModalElement = document.getElementById("commentModal");
//   // const commentModal2Element = document.getElementById("commentModal2");

//   // Show comment modal 1
//   commentModalElement.addEventListener("click", function () {
//      $("#commentModal").modal("show");
//   });

  // Show comment modal 2
  // commentModal2Element.addEventListener("click", function () {
  //    $("#commentModal2").modal("show");
//   // });
// });
// document.getElementById('comment').addEventListener('click',()=>{
//   document.getElementById('boxOfCommentaire').className="visible";

// }
// )

// close

let button = document.getElementById('photoModal');

function closeImage() {
    // Utiliser la méthode 'hide' pour fermer la modale
    let modal = new bootstrap.Modal(button);
    modal.hide();
}
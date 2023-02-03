const accordion = document.getElementsByClassName('content');

for (i=0; i<accordion.length; i++) {
  accordion[i].addEventListener('click', function () {
    this.classList.toggle('active');
    // var panel = this.children[0].children[2];
    // console.log(panel);
    // //var panel = this.nextElementSibling;
    // if (panel.style.display === "block") {
    //   panel.style.overflow = "hidden";
    // } else {
    //   panel.style.overflow = "visible";
    // }
  });
}
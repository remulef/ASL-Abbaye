var input = document.querySelector('.input');
var inputDiv = document.querySelector('.input div');
var tag = document.querySelector('#tag');
tag.addEventListener('click', function(e) {
    var newTag = document.createElement('SPAN');
    newTag.classList.add('tag');
    newTag.textContent = document.getElementById("inputag").value;
    input.insertBefore(newTag, inputDiv);
});
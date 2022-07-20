/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/selectImage.js ***!
  \*************************************/


var images = document.querySelectorAll('.image'); //全てのimageタグを取得 

images.forEach(function (image) {
  // 1つずつ繰り返す 
  image.addEventListener('click', function (e) {
    // クリックしたら 
    var imageName = e.target.dataset.id.substr(0, 6); //data-idの6文字 

    var imageId = e.target.dataset.id.replace(imageName + '_', ''); // 6文字カット 

    var imageFile = e.target.dataset.file;
    var imagePath = e.target.dataset.path;
    var modal = e.target.dataset.modal; // サムネイルと input type=hiddenのvalueに設定 

    document.getElementById(imageName + '_thumbnail').src = imagePath + '/' + imageFile;
    document.getElementById(imageName + '_hidden').value = imageId;
    MicroModal.close(modal); //モーダルを閉じる 
  });
});
/******/ })()
;
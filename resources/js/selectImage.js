'use strict' 
const images = document.querySelectorAll('.image') //全てのimageタグを取得 

images.forEach(image => { // 1つずつ繰り返す 
    image.addEventListener('click', function(e){ // クリックしたら 
        const imageName = e.target.dataset.id.substr(0, 6) //data-idの6文字 
        const imageId = e.target.dataset.id.replace(imageName + '_', '') // 6文字カット 
        const imageFile = e.target.dataset.file 
        const imagePath = e.target.dataset.path 
        const modal = e.target.dataset.modal 
        // サムネイルと input type=hiddenのvalueに設定 
        document.getElementById(imageName + '_thumbnail').src = imagePath + '/' + imageFile 
        document.getElementById(imageName + '_hidden').value = imageId 
        MicroModal.close(modal); //モーダルを閉じる 
    }) 
})
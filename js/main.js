function send (id){
    var xhr = new XMLHttpRequest();
let price = document.getElementById('id' + id)
price = price.value
xhr.open('GET', 'index.php?id=' + id + '&price=' + price, false)
xhr.send()
if (xhr.status != 200) {
  console.log( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
} else {
        if(xhr.responseText === 'true') {
       alert('Данные обновлены');
       }

}
}
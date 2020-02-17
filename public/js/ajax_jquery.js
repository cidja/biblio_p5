let test = document.getElementById('next');
test.addEventListener('click', function (e) {
    console.log("test");
});

$('#next').on('click', () => {
    console.log("yes");
    $.ajax({ 
        url : "oneNovelView.php",
        type : "GET",
        data : "id=" + $id,
        context : document.body
    });
});

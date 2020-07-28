document.addEventListener('DOMContentLoaded', () => {

    const postMain = document.querySelector('.postMain');
    const loader = document.querySelector('#loader');
    const pageno = document.querySelector('#pageno');

    const url = './includes/showPosts.php';
    let pagenoVal = pageno.value;

    loader.style.display = 'none';

    //AJAX for posts

    // pageno.addEventListener('click',() => {
    //     fetchPosts(pagenoVal);
    //     pagenoVal++;
    // });

    function fetchPosts (offsetNum) {
        fetch(url,{
            method: 'POST',
            body: new URLSearchParams(`request=${offsetNum}`)
        })
        .then(res => res.text())
        .then((body) => {postMain.innerHTML += body})
        .catch(error => console.log(error))
    }

    fetchPosts(pagenoVal);


    // OLD STYLE AJAX REQUEST
    // function ajaxPostPagin(pagenoNum) {

    //     let request = new XMLHttpRequest();

    //     request.onreadystatechange = () => {
    //         if (request.readyState === 4 && request.status === 200) {
    //             postMain.innerHTML += request.responseText;
    //         } else {
    //             console.log(`An error occurred during request: ${request.status} ${request.statusText}`);
    //         }
    //     }

    //     request.open('POST', `./includes/showPosts.php?request=${pagenoNum}`);


    //     request.send();
    // }





});
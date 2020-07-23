document.addEventListener('DOMContentLoaded', () => {

    const postMain = document.querySelector('.postMain');
    const loader = document.querySelector('#loader');
    const pageno = document.querySelector('#pageno');

    let pagenoVal = pageno.value;

    loader.style.display = 'none';

    //AJAX for posts

    pageno.addEventListener('click', function () {
        ajaxPostPagin(pagenoVal);
        pagenoVal++;
    });

    function ajaxPostPagin(pagenoNum) {

        let request = new XMLHttpRequest();

        request.onreadystatechange = () => {
            if (request.readyState === 4 && request.status === 200) {
                postMain.innerHTML += request.responseText;
            } else {
                console.log(`An error occurred during request: ${request.status} ${request.statusText}`);
            }
        }

        request.open('GET', `./includes/showPosts.php?request=${pagenoNum}`);


        request.send();
    }





});
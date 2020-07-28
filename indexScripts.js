document.addEventListener('DOMContentLoaded', () => {

    const postMain = document.querySelector('.postMain');
    const loader = document.querySelector('#loader');
    const pageno = document.querySelector('#pageno');
    const pagenoClone = pageno.cloneNode(true)

    const url = './includes/showPosts.php';
    let pagenoVal = 4;

    loader.style.display = 'none';

    //AJAX for posts

    pageno.addEventListener('click',() => {
        fetchPosts(pagenoVal);
        pagenoVal += 4;
    });

    function fetchPosts (offsetNum) {
        fetch(url,{
            method: 'POST',
            body: new URLSearchParams(`request=${offsetNum}`)
        })
        .then(res => res.text())
        .then((body) => {body === "" ? (pageno.parentNode.replaceChild(pagenoClone, pageno), pagenoClone.classList.add('disabled'), pagenoClone.textContent = "That's all for now =)"): postMain.innerHTML += body})
        // .then((body) => {kek.push(body)})
        .catch(error => console.log(error))
    }

    fetchPosts(0);

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
'use strict';

// Элементы на странице
const formSearch = document.querySelector(".form-search"),
    inputCitiesFrom = formSearch.querySelector(".input__cities-from"),
    dropdownCitiesFrom = formSearch.querySelector(".dropdown__cities-from"),
    inputCitiesTo = formSearch.querySelector(".input__cities-to"),
    dropdownCitiesTo = formSearch.querySelector(".dropdown__cities-to"),
    inputDataDepart = formSearch.querySelector(".input__date-depart"),
    cheapestTicket = document.getElementById('cheapest-ticket'),
    otherCheapTickets = document.getElementById('other-cheap-tickets');


let city = [];


const citiesApi = 'dataBase/cities.json',
    //citiesApi = 'http://api.travelpayouts.com/data/ru/cities.json',
    proxy = 'https://cors-anywhere.herokuapp.com/',
    API_KEY = '4c5b03533ae89342a8094e935e66608a',
    CALENDAR = 'http://min-prices.aviasales.ru/calendar_preload',
    MAX_COUNT = 10;


// Функции

const getData = (url, callback, reject = console.error) => {
    const request = new XMLHttpRequest();

    request.open("GET", url);

    request.addEventListener('readystatechange', () => {
        if (request.readyState !== 4) return;

        if (request.status === 200) {
            callback(request.response);
        } else {
            reject(request.status);
        }
    })

    request.send();



};


const showCity = (input, list) => {
    list.textContent = "";

    if (input.value === "") return;

    const filterCity = city.filter((item) => {
        const fixItem = item.name.toLowerCase();
        return fixItem.startsWith(input.value.toLowerCase());
    });

    filterCity.forEach((item) => {
        const li = document.createElement("li");
        li.classList.add('dropdown__city');
        li.textContent = item.name;
        list.append(li);
    });

};

const getNameCity = (code) => {
    const objCity = city.find((item) => item.code === code);
    return objCity.name;
};

const getChanges = (num) => {
    if (num) {
        return num === 1 ? `Одна пересадка` : `Несколько пересадок`;
    } else {
        return "Без пересадок";
    }
};

const getDate = (date) => {
    return new Date(date).toLocaleString('ru', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    });
};

const getLinkAviasales = (data) => {
    let link = 'https://www.aviasales.ru/search/';

    link += data.origin;

    const date = new Date(data.depart_date);

    const day = date.getDate();

    link += day < 10 ? '0' + day : day;

    const month = date.getMonth() + 1;

    link += month < 10 ? '0' + month : month;

    link += data.destination;

    link += '1';

    return link;
};

const createCard = (data) => {
    const ticket = document.createElement('article');
    ticket.classList.add('ticket');

    let deep = '';

    if (data) {
        deep = `
        <h3 class="agent">${data.gate}</h3>
        <div class="ticket__wrapper">
            <div class="left-side">
                <a href="${getLinkAviasales(data)}" target='_blank' class="button button__buy">Купить
                    за ${data.value}₽</a>
            </div>
            <div class="right-side">
                <div class="block-left">
                    <div class="city__from">Вылет из города
                        <span class="city__name">${getNameCity(data.origin)}</span>
                    </div>
                    <div class="date">${getDate(data.depart_date)}</div>
                </div>

                <div class="block-right">
                    <div class="changes">${getChanges(data.number_of_changes)}</div>
                    <div class="city__to">Город назначения:
                        <span class="city__name">${getNameCity(data.destination)}</span>
                    </div>
                </div>
            </div>
        </div>
        `;
    } else {
        deep = '<h3> На выбранные даты билетов нет =( </h3>'
    }
    ticket.insertAdjacentHTML('afterbegin', deep);


    return ticket;
};

const renderCheapDay = (cheapTicket) => {
    cheapestTicket.style.display = 'block';
    cheapestTicket.innerHTML = '<h2>Самый дешевый билет на выбранную дату</h2>';


    const ticket = createCard(cheapTicket[0]);
    cheapestTicket.append(ticket);



};



const renderCheapYear = (cheapTickets) => {
    otherCheapTickets.style.display = 'block';
    otherCheapTickets.innerHTML = '<h2>Самые дешевые билеты на другие даты</h2>';

    cheapTickets.sort((a, b) => a.value - b.value);

    for (let i = 0; i < cheapTickets.length && i < MAX_COUNT; i++) {
        const ticket = createCard(cheapTickets[i]);
        otherCheapTickets.append(ticket);
    }
};


const renderCheap = (data, date) => {
    const cheapTicketYear = JSON.parse(data).best_prices;

    const cheapTicketDay = cheapTicketYear.filter((item) => {
        return item.depart_date === date;
    });



    renderCheapDay(cheapTicketDay);
    renderCheapYear(cheapTicketYear);
};

//типизировал функцию по шаблону Макса 

const addCity = (event, item, list) => {
    const target = event.target;
    if (target.tagName.toLowerCase() === 'li') {
        item.value = target.textContent;
        list.textContent = "";
        //прикрутил небольшой цикл который удаляет выбранный город, чтобы он не высвечивался
        // for(let i = 0; i < city.length; i++ ){
        //     if(city[i] == item.value){
        //         city.splice(i,1);
        //         i--;
        //     }
        // }
    }
};



//Обработчики событий

inputCitiesFrom.addEventListener('input', () => {
    showCity(inputCitiesFrom, dropdownCitiesFrom);
});


dropdownCitiesFrom.addEventListener("click", (event) => {
    addCity(event, inputCitiesFrom, dropdownCitiesFrom);
});


inputCitiesTo.addEventListener('input', () => {
    showCity(inputCitiesTo, dropdownCitiesTo);
});

dropdownCitiesTo.addEventListener("click", (event) => {
    addCity(event, inputCitiesTo, dropdownCitiesTo);
});

formSearch.addEventListener('submit', (event) => {
    event.preventDefault();

    const cityFrom = city.find((item) => inputCitiesFrom.value === item.name);
    const cityTo = city.find((item) => inputCitiesTo.value === item.name)

    const formData = {
        from: cityFrom,
        to: cityTo,
        when: inputDataDepart.value,
    };

    if (formData.from && formData.to) {
        const requestData = `?depart_date=${formData.when}&origin=${formData.from.code}&destination=${formData.to.code}&one_way=true`;

        getData(CALENDAR + requestData, (response) => {
            renderCheap(response, formData.when);
        }, error => {
            alert("В этом направлении нет рейсов");
            console.error('Ошибка', error);
        });
    } else {
        alert('Введите корректное название города');
    }

});


///////////////////////////////////////////////////////////////////


getData(citiesApi, (data) => {
    city = JSON.parse(data).filter(item => item.name);

    city.sort((a, b) => {
        if (a.name > b.name) {
            return 1;
        }
        if (a.name < b.name) {
            return -1;
        }
        return 0;
    });
});
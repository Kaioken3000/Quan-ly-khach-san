<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ô nhó</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet prefetch" href="https://fonts.googleapis.com/css?family=Coda">
    <link rel="stylesheet" href="css/app.css">
</head>

<body>

    <div class="container">
        <header>
            <h1>Ô nhớ</h1>
        </header>

        <section class="score-panel">
            <ul class="stars">
                <li id="one"><i class="fa fa-star"></i></li>
                <li id="two"><i class="fa fa-star"></i></li>
                <li id="three"><i class="fa fa-star"></i></li>
            </ul>
            <p><span id="moves">0</span> Lượt</p>
            <div id="timer">00:00</div>
            <button id="restartClick">
                <i class="fa fa-repeat"></i>
            </button>
        </section>
        <ul class="deck">
            <li class="card" tabindex="0">
                <i class="fa fa-diamond"></i>
            </li>
            <li class="card" tabindex="0">
                <i class="fa fa-paper-plane-o"></i>
            </li>
            <li class="card" tabindex="0">
                <i class="fa fa-anchor"></i>
            </li>
            <li class="card" tabindex="0">
                <i class="fa fa-bolt"></i>
            </li>
            <li class="card">
                <i class="fa fa-cube"></i>
            </li>
            <li class="card">
                <i class="fa fa-anchor"></i>
            </li>
            <li class="card">
                <i class="fa fa-leaf"></i>
            </li>
            <li class="card">
                <i class="fa fa-bicycle"></i>
            </li>
            <li class="card">
                <i class="fa fa-diamond"></i>
            </li>
            <li class="card">
                <i class="fa fa-bomb"></i>
            </li>
            <li class="card">
                <i class="fa fa-leaf"></i>
            </li>
            <li class="card">
                <i class="fa fa-bomb"></i>
            </li>
            <li class="card">
                <i class="fa fa-bolt"></i>
            </li>
            <li class="card">
                <i class="fa fa-bicycle"></i>
            </li>
            <li class="card">
                <i class="fa fa-paper-plane-o"></i>
            </li>
            <li class="card">
                <i class="fa fa-cube"></i>
            </li>
        </ul>
    </div>

    <!--  <div id="leader-board" class="leaderboard-modal">
   <div class="result-board">
      <h1 class='board-heading'>Leader-Board</h1>
    <p id="result"></p>
   </div>
</div> -->

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">

            <h1 id="modal-heading">Congratulation You Won !</h1>
            <div class="result-board">
                <h1 class='board-heading'>Leader Board</h1>
                <p id="result" class="result-text"></p>
            </div>
            <button id="play-again" tabindex ="-1" class="play-again-button">Play again</button>

        </div>
    </div>

    <script src="js/app.js"></script>
</body>

<style>
    html {
        box-sizing: border-box;
    }

    *,
    *::before,
    *::after {
        box-sizing: inherit;
    }

    .stopwatch {
        font-size: 16px;
        text-align: center;
    }

    html,
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        background: #ffffff url('../img/geometry2.png');
        /* Background pattern from Subtle Patterns */
        font-family: 'Coda', cursive;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    h1 {
        font-family: 'Open Sans', sans-serif;
        font-weight: 300;
    }

    /*
 * Styles for the deck of cards
 */

    .deck {
        width: 660px;
        min-height: 680px;
        background: linear-gradient(160deg, #02ccba 0%, #aa7ecd 100%);
        padding: 32px;
        border-radius: 10px;
        box-shadow: 12px 15px 20px 0 rgba(46, 61, 73, 0.5);
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        margin: 0 0 3em;
    }

    .deck>.card {
        height: 125px;
        width: 125px;
        background: #2e3d49;
        font-size: 0;
        color: #ffffff;
        border-radius: 8px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 5px 2px 20px 0 rgba(46, 61, 73, 0.5);
    }

    .deck .card.open {
        transform: rotateY(0);
        background: #02b3e4;
        cursor: default;
        pointer-events: none;
    }

    .deck .card.show {
        font-size: 33px;
    }

    .deck .card.match {
        cursor: default;
        background: #02ccba;
        font-size: 33px;
        pointer-events: none;
    }

    .trick {
        -webkit-transition: width 2s, height 2s, -webkit-transform 2s;
        /* Safari */
        transition: width 2s, height 2s, transform 2s;
        -webkit-transform: rotate(360deg);
        /* Safari */
        transform: rotate(360deg);
    }

    /*
*Leader Board
*/

    .board-heading {
        text-align: center;
        padding: 5px;
        color: red;
    }

    .result-board {
        height: 200px;
        background-color: #fefefe;
        margin: auto;
        padding: 10px;
        border: 1px solid #888;
        width: 45%;
        overflow: scroll;
        /*     text-align: center; */
    }

    /*
 * Styles for the Score Panel
 */
    .score-panel {
        display: flex;
        text-align: left;
        width: 620px;
        margin-bottom: 10px;
        justify-content: space-between;
    }

    .score-panel .stars {

        margin: 0;
        padding: 0;
        display: inline-block;
    }

    .score-panel p {
        margin: 0;
    }

    .score-panel .stars li {
        list-style: none;
        display: inline-block;
    }

    .score-panel .restart {
        float: right;
        cursor: pointer;
    }

    /*
*MODAL
*/

    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.7);
        /* Black w/ opacity */

    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        text-align: center;
    }

    .play-again-button {
        cursor: pointer;
        font-size: 1.5em;
        padding: 5px;
        margin: 10px;
    }

    .play-again-button:hover {
        color: green;
    }

    .modal-text {
        font-size: 24px;
        line-height: 36px;

    }

    /* RESPONSIVE  */

    @media screen and (min-width: 360px) and (max-width: 480px) {
        h1 {
            font-size: 1.5em;
        }

        .result-board {
            width: 90%;
        }

        .fa {
            font-size: 0.8em;
        }

        .modal-text {
            font-size: 18px;
            padding: 5px;
            line-height: 28px;
            margin: 0;
        }

        .modal-content {
            padding: 10px;
        }

        .score-panel {
            font-size: 1em;
            width: 335px;
        }

        .deck {
            width: 360px;
            min-height: 480px;
            padding: 20px;
            margin: 0;
        }

        .deck .card {
            height: 75px;
            width: 75px;
        }

        .deck .card.show {
            font-size: 22px;
        }

        .deck .card.match {
            font-size: 22px;
        }

        .deck .card.notmatch {
            font-size: 22px;
        }

        .score-panel .restart {
            padding: 0 8px 0 8px;
        }

        #modal-heading {
            font-size: 1.5em;
            margin: 0;
            padding-top: 10px;
        }
    }

    @media screen and (min-width: 481px) and (max-width: 640px) {
        .fa {
            font-size: 0.8em;
        }

        h1 {
            font-size: 28px;
        }

        .result-board {
            width: 85%;
        }

        .modal-text {
            font-size: 18px;
        }

        .result-text {
            font-size: 16px;
        }

        .deck {
            width: 438px;
            min-height: 523px;
            padding: 20px;
            margin: 0;
        }

        .deck .card {
            height: 90px;
            width: 90px;
        }

        .deck .card.match {
            font-size: 22px;
        }

        .deck .card.notmatch {
            font-size: 22px;
        }

        .score-panel {
            width: 420px;
        }

        .score-panel .restart {
            padding: 0 12px 0 12px;
        }
    }

    @media screen and (min-width: 641px) and (max-width: 700px) {
        .fa {
            font-size: 0.8em;
        }

        .result-board {
            width: 65%;
        }

        .deck {
            width: 559px;
            min-height: 598px;
            padding: 20px;
            margin: 0;
        }

        .deck .card {
            height: 120px;
            width: 116px;
        }

        .deck .card.match {
            font-size: 22px;
        }

        .deck .card.notmatch {
            font-size: 22px;
        }

        .score-panel {
            width: 528px;
        }

        .score-panel .restart {
            padding: 0 12px 0 12px;
        }
    }

    @media screen and (min-width: 701px) and (max-width: 1000px) {
        .result-board {
            width: 60%;
        }
    }
</style>
<script>
    let card = document.getElementsByClassName('card');
    let cards = [...card];
    let deck = document.querySelector('.deck');
    let openedCards = [];
    let changeMovesNumber = document.getElementById('moves');
    let matchCount = 0;
    const button = document.getElementById('play-again');
    let starN = 0;
    let time = '00:00'
    let seconds = 0;
    let minutes = 0;
    let timeTiger = 0;
    let t;
    const timer = document.getElementById('timer');
    const modal = document.getElementById('myModal');
    const modalHeading = document.querySelector('#modal-heading');
    let modalMessage = '';

    window.onload = function() {
        newGame();
    };

    /* RESTART THE GAME */
    let restartClick = document.getElementById('restartClick');
    restartClick.addEventListener('click', newGame);

    /* shuffle the list of cards with "shuffle" method */
    // let shuffledCards = shuffle(cards);
    // newGame();

    /*
     *Setting up the cards for the game: 
     *Shuffle function from http://stackoverflow.com/a/2450976
     */

    function shuffle(array) {
        var currentIndex = array.length,
            temporaryValue, randomIndex;

        while (currentIndex !== 0) {
            randomIndex = Math.floor(Math.random() * currentIndex);

            // console.log(randomIndex);
            // debugger;
            currentIndex -= 1;
            temporaryValue = array[currentIndex];
            array[currentIndex] = array[randomIndex];
            array[randomIndex] = temporaryValue;

        }

        return array;
    }

    /*
     *display the cards on the page
     *loop through each card and create its HTML
     *add each card's HTML to the page
     */

    function newCards() {
        let shuffleCards = shuffle(cards);

        for (let i = 0; i < shuffleCards.length; i++) {
            shuffleCards[i].classList.remove('show', 'open', 'match', 'trick');

            deck.appendChild(shuffleCards[i]);
        }
        for (let shuffleCard of shuffleCards) {
            shuffleCard.addEventListener('click', clickedCards);
        }
    }

    function newGame() {
        resetMovesCount();
        resetStarRating();
        matchCount = 0;
        timeTiger = 0;
        resetTimer();
        openedCards = [];
        modalMessage.innerHTML = '';
        newCards();
    }

    /* this function starts different function to show and match cards */



    /* once the card is clicked the time and comparison initialise */
    function clickedCards() {
        showCard();
        addToOpenCards();
        timeTiger++
        if (timeTiger === 1) {
            startTimer();
        }
        if (openedCards.length === 2) {
            addMoves();
            if (openedCards[0].innerHTML === openedCards[1].innerHTML) {
                matchCount++;
                console.log(matchCount);
                stopClock();
                match();
            } else {
                notMatch();
            }
        }


        /* display the card's symbol */
        function showCard() {
            // console.log(event.target.tagName);
            debugger;
            const cardTagName = event.target
            if (cardTagName.tagName === 'LI') {
                if (openedCards.length < 2) {
                    event.target.classList.add('open', 'show');
                    console.log(event.target);
                }
            }
        }

        /* add the card to a *list* of "open" cards */
        function addToOpenCards() {
            openedCards.push(event.target);
            // if (openedCards.length < 2);
        }

        /* check whether the two cards match or not */
        function match() {
            openedCards[0].classList.add('match', 'trick');
            event.target.classList.add('match', 'trick');
            openedCards[0].classList.remove('show', 'open');
            event.target.classList.remove('show', 'open');
            openedCards = [];
        }

        function notMatch() {
            setTimeout(function() {
                openedCards[0].classList.remove('open', 'show');
                openedCards[1].classList.remove('open', 'show');
                openedCards = [];
            }, 500);
        }
    };

    /* delay opened cards so you can see them before they disappear if not match*/

    /* increment the move counter and display it on the page */
    function addMoves() {
        moves++;
        console.log(moves);
        changeMovesNumber.textContent = moves;
        starRating();
    }

    function resetMovesCount() {
        moves = 0;
        changeMovesNumber.textContent = moves;
    }

    /* deduct stars */
    function starRating() {
        if (moves > 8 && moves < 21) {
            starN = 3;
        }
        if (moves > 20 && moves < 30) {
            document.getElementById('one').innerHTML = '<i class="fa fa-star-o"></i>';
            starN = 2;
        }
        if (moves > 30) {
            document.getElementById('one').innerHTML = '<i class="fa fa-star-o"></i>';
            document.getElementById('two').innerHTML = '<i class="fa fa-star-o"></i>';
            starN = 1;
        }
    }

    /* reset stars */
    function resetStarRating() {
        document.getElementById('one').innerHTML = '<i class="fa fa-star"></i>';
        document.getElementById('two').innerHTML = '<i class="fa fa-star"></i>';
    }

    function startTimer() {
        clearInterval(t);
        t = setInterval(buildTimer, 1000);
    }

    timer.textContent = time;

    function buildTimer() {
        seconds++;
        if (seconds === 60) {
            seconds = 0;
            minutes++;
            if (minutes === 60) {
                minutes = 0;
                seconds = 0;
            }
        }
        timer.textContent = (minutes < 10 ? "0" + minutes.toString() : minutes) + ":" + (seconds < 10 ? "0" + seconds
            .toString() : seconds);
    }

    function stopClock() {
        if (matchCount === 8) {
            clearInterval(t);
            gameEnds();
        }
    }

    function resetTimer() {
        clearInterval(t);
        seconds = 0;
        minutes = 0;
        timer.textContent = time;
    }


    /* MODAL - display a message with the final score */
    /* When the user clicks on the last card the modal opens */
    function gameEnds() {
        modalMessage = document.createElement('p');
        modalMessage.innerHTML = '<p>Your time ' + timer.textContent + ', ' + moves + ' Moves and ' + starN +
            ' Stars !</br> WOOO!</p>';
        modalMessage.classList.add('modal-text');
        modalHeading.appendChild(modalMessage);
        modal.style.display = 'block';

        alert("Bạn {!! auth()->user()->username !!} được cộng " + 5 + " điểm vào điểm tích luỹ");
        capnhatdiem(5);
    }

    // cap nhat diem
    function capnhatdiem(diemchon) {
        data = JSON.stringify({
            khachhangid: {!! auth()->user()->khachhangs[0]->id !!},
            diem: diemchon,
        })
        // console.log(data);
        fetch("http://khachsan-b1910261.local/mobile/game/capnhatdiem", {
            method: "POST",
            body: data,
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        });
    }

    //When the user clicks on the button "play again", close it
    button.onclick = function() {
        modal.style.display = 'none';
        scoreRepository();
        newGame();
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
            newGame();
            resetTimer();
        }
    };


    function scoreRepository() {
        localStorage.setItem('moves', moves);
        localStorage.setItem('star_number', starN);
        localStorage.setItem('timer', timer.textContent);

        const addResults = document.getElementById('result');
        let resultTextToAdd = 'Your time ' + timer.textContent + ', ' + moves + ' Moves and ' + starN +
            ' Stars</ br></p>';
        addResults.insertAdjacentHTML('afterend', resultTextToAdd);
    }
</script>

</html>

let btn = document.getElementById('btn');
let roll = document.querySelector('.rollet');
let num = document.querySelector('.num');
let win = document.querySelector('.win');
let lost = document.querySelector('.lost');
let betNumStr = document.forms[0].num;
let betSum = document.forms[0].bet;
let wallet = 2000;


function rand (start = 0, finish = 12){
    return Math.random() * (finish - start + 1);
}
btn.onclick = function () {
    let total = +betSum.value;
    if (total>=50){
        if (wallet>=total){
            roll.style.animationPlayState = 'running';
            num.innerText = 'running';
            setTimeout(function () {
                num.innerText = Math.round(rand());
                roll.style.animationPlayState = 'paused';
                let randNum = +num.innerHTML
                let profit = 0;
                let betNum = +betNumStr.value;
                if (randNum == betNum){
                    profit = (12*total);
                    wallet = wallet+profit;
                    win.style.display = 'block';
                    lost.style.display = 'none';
                    win.innerHTML = `<h2>Congratulation , you are winner , profit :${profit}$ !</h2><div>Wallet : ${wallet}$</div>`;
                }else {
                    wallet = wallet - total;
                    win.style.display = 'none';
                    lost.style.display = 'block';
                    lost.innerHTML = `<h2>unfortunately , you are lost ${total}$!</h2><div>Wallet : ${wallet}$</div>`;
                }
            }, 2000);
        }else{
            win.style.display = 'none';
            lost.style.display = 'block';
            lost.innerHTML = `<h2>Not enough money for bet!</h2><div>Wallet : ${wallet}$</div>`;
        }
    }else{
        win.style.display = 'none';
        lost.style.display = 'block';
        lost.innerHTML = `<h2>Bet sum must be mor then or equal 50!</h2><div>Wallet : ${wallet}$</div>`;
    }
}
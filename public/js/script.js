let circularProgress1 = document.querySelector('.circular-progress1'),
    progressValue1 = document.querySelector('.progress-value1');
let completedTasks = document.getElementById('comletedTasks').value;
let total_tasks = document.getElementById('totalTasks').value;
// alert(total_tasks);
let progressStartValue1 = 0,
    progressEndValue1 = Math.round(completedTasks*100/total_tasks),
    speed1 = 0;
let progress1 = setInterval(() => {
    if(progressEndValue1 > 0){
        progressStartValue1++;
    }

    progressValue1.textContent = `${progressStartValue1}%`
    circularProgress1.style.background = `conic-gradient(rgb(87, 197, 87) ${progressStartValue1 * 3.6}deg, #ededed 0deg)`
    if (progressStartValue1 >= progressEndValue1) {
        clearInterval(progress1);
    }
}, speed1);


let circularProgress2 = document.querySelector('.circular-progress2'),
    progressValue2 = document.querySelector('.progress-value2');
    let onProgress = document.getElementById('onProgress').value;

let progressStartValue2 = 0,
    progressEndValue2 =  Math.round(onProgress*100/total_tasks),
    speed2 = 0;

let progress2 = setInterval(() => {
    if(progressEndValue2 > 0){
        progressStartValue2++;
    }

    progressValue2.textContent = `${progressStartValue2}%`
    circularProgress2.style.background = `conic-gradient(orange ${progressStartValue2 * 3.6}deg, #ededed 0deg)`

    if (progressStartValue2 == progressEndValue2) {
        clearInterval(progress2);
    }
}, speed2);

let circularProgress3 = document.querySelector('.circular-progress3'),
    progressValue3 = document.querySelector('.progress-value3');
    let pendingTasks = document.getElementById('pendingTasks').value;
let progressStartValue3 = 0,
    progressEndValue3 = Math.round(pendingTasks*100/total_tasks),
    speed3 = 0;

let progress3 = setInterval(() => {
    if(progressEndValue3 > 0){
        progressStartValue3++;
    }

    progressValue3.textContent = `${progressStartValue3}%`
    circularProgress3.style.background = `conic-gradient(grey ${progressStartValue3 * 3.6}deg, #ededed 0deg)`

    if (progressStartValue3 == progressEndValue3) {
        clearInterval(progress3);
    }
}, speed3);




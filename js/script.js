/* For first canvas */
let canvas1 = document.getElementById("canvas1")
let ctx1 = canvas1.getContext('2d')
new Chart(ctx1,{
    type: "line",
    data: {
        labels: ['html','css','bootstrap','javascript','react','angular','vue','laravel','php'],
        datasets: [{
            label: "User's Information Show",
            data: [5,10,15,20,25,20,30,35,40],
            backgroundColor: ['red','green','blue','orange','pink','lightskyblue','lightgreen','crimson','yellow']
        }]
    },
    options: {
        animation: {
            duration: 3000,
            easing: "easeInOutBounce"
        }
    }
})

/* For second canvas */
let canvas2 = document.getElementById("canvas2")
let ctx2 = canvas2.getContext('2d')
new Chart(ctx2,{
    type: "bar",
    data: {
        labels: ['html','css','bootstrap','javascript','react','angular','vue','laravel','php'],
        datasets: [{
            label: "User's data show",
            data: [5,10,15,20,25,20,30,35,40],
            backgroundColor: ['red','green','blue','orange','pink','lightskyblue','lightgreen','crimson','yellow']
        }]
    },
    options: {
        animation: {
            duration: 3000,
            easing: "easeInOutBounce"
        }
    }
})
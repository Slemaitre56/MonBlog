let ar = [
    "f6",
    "2f",
    "2a",
    "00",
    "3b",
    "62",
    "61",
    "d4",
    "91",
    "44",
    "0c",
    "43",
    "e3",
    "10",
    "ea",
    "6c",
    // "f62f2a003b6261d491440c43e310ea6c",
];

let t = '';
ar.forEach((e)=>{
t += e;
});

let creds = {
    token: t,
}
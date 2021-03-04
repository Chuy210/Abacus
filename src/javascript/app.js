var debuggin = document.getElementById("test");
var run = document.getElementById("run");


run.addEventListener("click", () => {

    da = {
        data: [{
                CodeName: "test1111112223333dsadsfacc",
                CustomerNumber: 99999,
                PaymentTermNumber: "",
                Name: "test1111112223333dsadsfacc",
                Line1: "",
                ZIP: 3434,
                City: "dsadsad",
                Phone1: "",
                SalutationNumber: 3,
                SalutationName: "",
                IndustryCode: 3,
                Website: "",
                Email: "test1Juan@mail.com",
                Language: "",
                SubjectType: 2,
                HouseNumber: 26,
                Street: "fdsfdsf",
                Currency: "CHF",
                CurrencyRisk: 0,
                CurrencyLimitAmount: 0,
                PaymentOrderESRProcedure: 1,
                PaymentOrderIPIProcedure: 0,
                StandardProcedure: 0
            },
            {
                CodeName: "testAccountJL",
                CustomerNumber: 0,
                PaymentTermNumber: "",
                Name: "testAccountJL",
                Line1: "",
                ZIP: "",
                City: "",
                Phone1: "",
                SalutationNumber: 3,
                SalutationName: "",
                IndustryCode: 3,
                Website: "",
                Email: "",
                Language: "",
                SubjectType: 2,
                HouseNumber: 26,
                Street: "",
                Currency: "CHF",
                CurrencyRisk: 0,
                CurrencyLimitAmount: 0,
                PaymentOrderESRProcedure: 1,
                PaymentOrderIPIProcedure: 0,
                StandardProcedure: 0
            }
        ]
    }
    fetch("https://1d86e0bbdc3c.ngrok.io/Abacus/index.php/get_infoZoho_Crm", {
        method: 'POST', // or 'PUT'
        body: JSON.stringify(da), // data can be `string` or {object}!
        headers: {
            'Content-Type': 'application/json'
        }
    }).then((data) => {
        return data;
    }).then((d) => {
        console.log(d);
    })
})
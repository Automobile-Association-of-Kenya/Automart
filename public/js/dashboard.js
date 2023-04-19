$(document).ready(function(){
    const currentmenu=$("#dashboard")
    setactivemenu(currentmenu)
    getloggedinmember()

    const   cardfreedeposits=$("#cardfreedeposits"),
            cardguaranteeddeposits=$("#cardgauaranteeddeposits"),
            cardmemberno=$("#cardmemberno"),
            cardmembernames=$("#cardmembernames"),
            cardmembercompany=$("#cardmembercompany"),
            cardmemberloans=$("#cardmemberloans"),
            cardmembershares=$("#cardmembershares"),
            cardmemberdeposits=$("#cardmemberdeposits"),
            cardmembersavings=$("#cardtotalsavings")


    $.getJSON(
        "../controllers/memberoperations.php",
        {
            getmemberdetails:true
        },
        (data)=>{

            noapplicationonpendingloans=data[0].noapplicationonpendingloans==1?true:false
            loanbasedonfreeshares=data[0].loanbasedonfreeshares==1?true:false
            memberpendingloans=data[0].memberpendingloans

            cardmemberno.text(data[0].memberno)
            cardmembernames.text(`${data[0].firstname} ${data[0].middlename} ${data[0].othernames}`)
            cardmembercompany.text(data[0].companyname)
            cardmemberloans.text(`${$.number(data[0].outstandingloans)} (${data[0].outstandingloancount})`)
            cardmembershares.text($.number(data[0].shares))
            cardmemberdeposits.text($.number(data[0].totaldeposits))
            cardfreedeposits.text($.number(data[0].freedeposits))
            cardguaranteeddeposits.text($.number(data[0].totaldeposits-data[0].freedeposits))
            cardmembersavings.val($.number(data[0].totalsavings))
        }
    )
})
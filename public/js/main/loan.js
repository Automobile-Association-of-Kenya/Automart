(function () {
    let loanproductID = $("#loanproductID"),
        loanPartnerID = $("#loanPartnerID");
    function getPartners() {
        $.getJSON("/partners", function (partners) {
            let option = '<option value="">Select One</option>';
            $.each(partners, function (key, value) {
                option +=
                    "<option value=" +
                    value.id +
                    ">" +
                    value.name +
                    "</option>";
            });
            loanPartnerID.html(option);
        });
    }
    getPartners();

    loanPartnerID.on("change", function () {
        let partner_id = $(this).val();
        if (partner_id !== null && partner_id !== "") {
            $.getJSON(
                "/partner-loanproducts/" + partner_id,
                function (loanproducts) {
                    let option = "<option value=''>Select One</option>";
                    $.each(loanproducts, function (key, value) {
                        option +=
                            "<option value=" +
                            value.id +
                            ">" +
                            value.name +
                            "</option>";
                    });
                    loanproductID.html(option);
                }
            );
        } else {
            loanproductID.html("<option value=''>Select One</option>");
        }
    });

    loanproductID.on("change", function (event) {
        let loanproduct_id = $(this).val();
        if (loanproduct_id !== "" && loanproduct_id !== null) {
            
        }
    });
})();

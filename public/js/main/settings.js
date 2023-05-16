(function () {
    let subscriptionsTableSection = $("#subscriptionsTableSection"),
        subscriptionID = $("#subscriptionID"),
        subscriptionName = $("#subscriptionName"),
        subPriority = $("#subPriority"),
        subCost = $("#subCost"),
        bilingCycle = $("#bilingCycle"),
        subscriptionFeatures = $("#subscriptionFeatures"),
        createSubscriptionForm = $("#createSubscriptionForm");

    createSubscriptionForm.on('submit', function(event) {
        event.preventDefault();
        let subscription_id = subscriptionID.val(),
            name = subscriptionName.val(),
            priority = subPriority.val(),
            cost = subCost.val(),
            bilingcycle = bilingCycle.val(), features = [];
        
    });

})();

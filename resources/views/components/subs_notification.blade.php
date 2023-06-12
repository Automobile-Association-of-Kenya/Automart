@if (Session::has('subscription_notification'))
    <div class="col-lg">
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
            </button>
            <strong>Info!</strong>
            {{ Session::get('subscription_notification') }}
        </div>
    </div>
@endif

<style>
    .dropdown-menu {
        background-color: #D19C97;

    }
    select {
        width: 50% !important;
    }
</style>
<form method="post" action="{{ route('front.convert.currency') }}" id="currency-form">
    @csrf
    <select class="custom-select d-inline" onchange="document.getElementById('currency-form').submit();" name="currency_code">
        <option value="EGP" @selected('EGP' == session('currency_code'))>
            EGP
        </option>
        <option value="SAR" @selected('SAR' == session('currency_code'))>
            SAR
        </option>
        <option value="AED" @selected('AED' == session('currency_code'))>
            AED
        </option>
        <option value="USD" @selected('USD' == session('currency_code'))>
            USD
        </option>
    </select>
</form>




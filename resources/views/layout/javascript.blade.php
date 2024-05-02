
<script>
    function submitForm(e){
        e.preventDefault();
        document.getElementById('logout-form').submit();
    }
</script>
<!-- General JS Scripts -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<!-- JS Libraies -->
<script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/index.js') }}"></script>
<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<!-- Custom JS File -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
<!-- JS Libraies -->
<script src="{{asset('assets/bundles/izitoast/js/iziToast.min.js')}}"></script>
<!-- Page Specific JS File -->
<script src="{{asset('assets/js/page/toastr.js')}}"></script>
<script src="{{asset('assets/bundles/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

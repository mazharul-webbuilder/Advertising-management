<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>


const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })


    $(document).ready(function (){
        $('.country-switch').on('click', function (){
            const countryCode = $(this).val()
            $.ajax({
                url: '{{route('admin.country.status.change')}}',
                method: 'GET',
                data: {code: countryCode},
                success: function (data) {
                    if (data.status === 200) {
                        console.log('tadfa')
                        Toast.fire({
                            icon: 'success',
                            title: 'Status Switch Successfully'
                        })
                    }
                }
            })
        })
    })
</script>
{{--Get Country Data--}}
<script>
    $(document).ready(function () {
        $('.select_country').on('change', function (){
            const country_code = $(this).val()
            $.ajax({
                url: '{{route('admin.get.country')}}',
                method: 'get',
                data: {code: country_code},
                success: function (data) {
                    if (data.status === 200)
                    {
                        $('#perDayAdLimit').val(data.country.per_day_ad_limit)
                    }
                }
            })
        })
    })
</script>
{{--End Country--}}

<script>
    $(document).ready(function (){
        const AdminCountryAddSetForm = $('#AdminCountryAddSetForm')
        AdminCountryAddSetForm.submit(function (event) {
            event.preventDefault();

            const formData = new FormData(AdminCountryAddSetForm[0]);
            $.ajax({
                url: '{{ route('admin.add.limit.per.day') }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.status === 200 ) {
                        $('.modal-close-btn').trigger('click');
                        /*Reset The Form*/
                        AdminCountryAddSetForm[0].reset()

                        /*Show Update Data on Table*/
                        let countryRow = $('.country-code-' + data.country.code)
                        countryRow.text(data.country.per_day_ad_limit)

                        /*Show Success Notification*/
                        Toast.fire({
                            'icon': data.type,
                            'title': data.message
                        })
                    }
                },
                error: function(xhr, status, error) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;

                        // Clear previous error messages
                        $('.error-message').remove();

                        // Display error messages for each input field
                        Object.keys(errors).forEach(function(field) {
                            const errorMessage = errors[field][0];
                            const inputField = $('[name="' + field + '"]');
                            inputField.after('<span class="error-message text-danger">' + errorMessage + '</span>');
                        });

                    } else {
                        console.log('An error occurred:', status, error);
                    }
                }
            })
        })
    })
</script>

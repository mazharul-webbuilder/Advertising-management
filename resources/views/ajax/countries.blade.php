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
                    console.log(data)
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

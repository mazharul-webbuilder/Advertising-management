<script>
    $(document).ready(function (){
        let datatable = $('#datatable-item').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{route('user.all.ads')}}',
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'add_type',
                    name: 'add_type'
                },
                {
                    data: 'ad',
                    name: 'ad'
                },
                {
                    data: 'target_audience',
                    name: 'target_audience'
                },
                {
                    data: 'duration',
                    name: 'duration'
                },
                {
                    data: 'days',
                    name: 'days'
                },
                {
                    data: 'status',
                    name: 'status',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    orderable: false
                }
            ]
        })
    })
</script>

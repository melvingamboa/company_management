function addEmployee(){
    $('document').ready( function(){
       
       
        dataTable();
       
        $('#employee_form').on('submit', function(){
            $( '#first_name-error' ).html( "" );
            $( '#last_name-error' ).html( "" );
            $( '#age-error' ).html( "" );
            $( '#position-error' ).html( "" );
            $( '#phone-error' ).html( "" );
            $( '#company-error' ).html( "" );
            $( '#email-error' ).html( "" );

            event.preventDefault();
            $.ajax({
                url:"/employees/store",
                type: "POST",
                data: $( this ).serialize(),
                dataType: "json",
                success: function(response){
                    if(response.success){

                        success_message(response);
                        $("#employee_form").trigger("reset");
                        $('#exampleModal').modal('hide');
                        $('#myTable').DataTable().ajax.reload();
                    }else{
                        $( '#first_name-error' ).html( response.error.first_name);
                        $( '#last_name-error' ).html( response.error.last_name);
                        $( '#age-error' ).html( response.error.age);
                        $( '#position-error' ).html( response.error.position);
                        $( '#phone-error' ).html( response.error.phone);
                        $( '#company-error' ).html( response.error.company);
                        $( '#email-error' ).html( response.error.email);
                    }
                }
            });
        });

        function success_message(response){
            $('#message').append(
                '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                ' <div class="col-md-6" id="message-success"></div>'+
                ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span>'+
                '</button>'+
                response.success+
                '</div>'
            );
        }
        $(document).on('click', '.edit_m', function(){
            $('#exampleModal').modal('show');
            $id =  $(this).data('id');
            $.ajax({
                url: '/employees/edit_employees/'+$id,
                success: function(res) {
                    $('#first_name').val(res.data.first_name);
                    $('#last_name').val(res.data.last_name  );
                    $('#position').val(res.data.position);
                    $('#email').val(res.data.email);
                    $('#age').val(res.data.age);
                    $('#phone').val(res.data.phone);
                }
         });
    
        }); 
        

    });

    function dataTable(){

        $('#myTable').DataTable( {
            "processing": true,
            // "serverSide": true,
            "ajax": "/employees/ajaxEmployees",
            "columns": [
                { "data": "first_name" },
                { "data": "position" },
                { "data": "email" },
                { "data": "employee_id" },
                { "render": function(data, type, row, meta) {
                     var csrf = $('input[name="_token"]').val();
                    return `
                        <a href="/employees/${row['employee_id']}" class="btn btn-secondary btn-sm">View</a>
                        <a href="javascript:;" class="btn btn-primary btn-sm edit_m" data-id="${row['employee_id']}">Edit</a>
                        <form action="/employees/destroy/${row['employee_id']}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="${csrf}">
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    `
                }}
            ]
        } );
    }

   
}
addEmployee();


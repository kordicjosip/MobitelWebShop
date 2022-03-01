
    $(function(){
      $(document).on('click', '#delete', function(e){
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        })

      });
    });


    $(function(){
        $(document).on('click', '#confirm', function(e){
          e.preventDefault();
          var link = $(this).attr("href");
  
          Swal.fire({
            title: 'Are you sure to Confirm?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, confirm it!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = link
              //Swal.fire(
              //  'Confirm!',
              //  'Order Confirmed.',
              //  'success'
             // )
            }
          })
  
        });
      });

      $(function(){
        $(document).on('click', '#processing', function(e){
          e.preventDefault();
          var link = $(this).attr("href");
  
          Swal.fire({
            title: 'Are you sure to Process?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, process it!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = link
              //Swal.fire(
                //'Confirm!',
                //'Order Confirmed.',
                //'success'
             // )
            }
          })
  
        });
      });

      $(function(){
        $(document).on('click', '#shipped', function(e){
          e.preventDefault();
          var link = $(this).attr("href");
  
          Swal.fire({
            title: 'Are you sure to Ship order?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, send it!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = link
              //Swal.fire(
                //'Confirm!',
                //'Order Confirmed.',
                //'success'
             // )
            }
          })
  
        });
      });


      $(function(){
        $(document).on('click', '#delivered', function(e){
          e.preventDefault();
          var link = $(this).attr("href");
  
          Swal.fire({
            title: 'Is order delivered?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = link
              //Swal.fire(
                //'Confirm!',
                //'Order Confirmed.',
                //'success'
             // )
            }
          })
  
        });
      });
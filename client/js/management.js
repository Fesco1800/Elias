// jQuery DataTable

$(document).ready(function() {
  $('#aliasTable').DataTable({
    order: [[15, 'desc']], 
    columnDefs: [
      { targets: [0, 1, 2, 3, 4], searchable: false, orderable: false },
      { 
        targets: 6, // Index of the target column (zero-based)
        createdCell: function (td) {
          $(td).css('padding-right', '10px'); // Adjust the padding as needed
        }
      }
    ]
  });
});





// Password Button toggle

function togglePassword(button) {
    var td = button.parentElement;
    var hidden = td.querySelector('.password-hidden');
    var visible = td.querySelector('.password-visible');

    if (hidden.style.display === 'none') {
        hidden.style.display = '';
        visible.style.display = 'none';
        button.innerHTML = '<i class="bi bi-eye"></i>';
    } else {
        hidden.style.display = 'none';
        visible.style.display = '';
        button.innerHTML = '<i class="bi bi-eye-slash"></i>';
    }
}


  





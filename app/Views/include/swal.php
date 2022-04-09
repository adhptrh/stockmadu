<script>
    console.log("swalalal")
        <?php
        switch (session()->get('fail')) {
            case "incorrect_creds":
                echo "Swal.fire({icon:'error',title:'Fail',text:'Username atau password tidak tepat'})";
                break;
        }
        switch (session()->get('success')) {
            case "outlet_added":
                echo "Swal.fire({icon:'success',title:'Success',text:'Outlet berhasil ditambah'})";
                break;
            case "outlet_deleted":
                echo "Swal.fire({icon:'success',title:'Success',text:'Outlet berhasil dihapus'})";
                break;
            case "outlet_edited":
                echo "Swal.fire({icon:'success',title:'Success',text:'Outlet berhasil diubah'})";
                break;
            case "product_added":
                echo "Swal.fire({icon:'success',title:'Success',text:'Produk berhasil ditambah'})";
                break;
            case "product_deleted":
                echo "Swal.fire({icon:'success',title:'Success',text:'Produk berhasil dihapus'})";
                break;
            case "product_edited":
                echo "Swal.fire({icon:'success',title:'Success',text:'Produk berhasil diubah'})";
                break;
            case "transaction_added":
                echo "Swal.fire({icon:'success',title:'Success',text:'Transaksi berhasil ditambah'})";
                break;
            case "user_added":
                echo "Swal.fire({icon:'success',title:'Success',text:'User berhasil ditambah'})";
                break;
            case "user_deleted":
                echo "Swal.fire({icon:'success',title:'Success',text:'User berhasil dihapus'})";
                break;
            case "user_edited":
                echo "Swal.fire({icon:'success',title:'Success',text:'User berhasil diubah'})";
                break;
        }
        ?>
    </script>
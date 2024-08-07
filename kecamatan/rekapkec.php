<?php
include 'kecamatan/tabelkecamatan.html';
?>    
    <footer class="bg-white rounded-lg">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400"> © 2024
                    <a target="_blank"
                        href="https://wa.me/6281915662166?text=saya ingin memberikan masukan untuk web ini"
                        class="hover:underline">ngurah182™</a>. All Rights Reserved.</span>
            </div>
        </div>
    </footer>


    <!-- jQuery, Bootstrap JS, and other scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });

        function loadData(page) {
            const url = "https://script.google.com/macros/s/AKfycbwqtRJDLpLR3UpF3-T8bPLjL_DP73QmPdD0Dzm_WFat_ff5Hi_yYeXPr42EZD3fwBo0SQ/exec";

            $.ajax({
                url: `${url}?action=filter-by-kecamatan&kecamatan=${page}`,
                method: "GET",
                dataType: "json",
                success: function (response) {
                    const data = response.data;

                    // Clear existing table data
                    $('#dataTable tbody').empty();

                    // Create Pivot Table Data
                    let pivotData = {};
                    data.forEach(row => {
                        if (!pivotData[row.jenisPtk]) {
                            pivotData[row.jenisPtk] = {
                                kebutuhan: 0,
                                pns: 0,
                                pppk: 0,
                                kontrakDinas: 0,
                                honorSekolah: 0,
                                kekurangan: 0,
                                kelebihan: 0
                            };
                        }
                        pivotData[row.jenisPtk].kebutuhan += parseFloat(row.kebutuhan) || 0;
                        pivotData[row.jenisPtk].pns += parseFloat(row.pns) || 0;
                        pivotData[row.jenisPtk].pppk += parseFloat(row.pppk) || 0;
                        pivotData[row.jenisPtk].kontrakDinas += parseFloat(row.kontrakDinas) || 0;
                        pivotData[row.jenisPtk].honorSekolah += parseFloat(row.honorSekolah) || 0;
                        pivotData[row.jenisPtk].kekurangan += parseFloat(row.kekurangan) || 0;
                        pivotData[row.jenisPtk].kelebihan += parseFloat(row.kelebihan) || 0;
                    });

                    // Append pivot table data
                    $.each(pivotData, function (jenisPtk, data) {
                        $('#dataTable tbody').append(
                            `<tr>
                                <td>${jenisPtk}</td>
                                <td>${data.kebutuhan}</td>
                                <td>${data.pns}</td>
                                <td>${data.pppk}</td>
                                <td>${data.kontrakDinas}</td>
                                <td>${data.honorSekolah}</td>
                                <td>${data.kekurangan}</td>
                                <td>${data.kelebihan}</td>
                            </tr>`
                        );
                    });
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                }
            });
        }
    </script>
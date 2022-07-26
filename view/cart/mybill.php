<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb ">
            <div class="boxtitle">
                ĐƠN HÀNG CỦA BẠN
            </div>
            <div class="row boxcontent frmdsloai">
                <table>
                    <thead>

                        <tr>
                            <th>MÃ ĐƠN HÀNG</th>
                            <th>NGÀY ĐẶT</th>
                            <th>SÔ LƯỢNG MẶT HÀNG</th>
                            <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                            <th>TÌNH TRẠNG ĐƠN HÀNG</th>

                        </tr>
                    </thead>

                    <?php
                    if (isset($listBill) && is_array($listBill)) {
                        foreach ($listBill as $item) {
                            $ttdh = get_ttdh($item['order_status']);
                            echo '<tr class="mybill">';
                            echo    '
                                    <td><a class="view_detail_bill" href="index.php?act=donhangct&id=' . $item['id'] . '">donhang' . $item['id'] . '</a></td>
                            
                                    <td>' . $item['ngaydathang'] . '</td>
                                    <td>' . count(json_decode($item['idsp'])) . '</td>
                                    <td>' . $item['total'] . '   VNĐ</td>
                                    <td>' . $ttdh . '</td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="boxphai">
        <?php include 'view/boxright.php'; ?>

    </div>
</div>
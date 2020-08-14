@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>人気の赤ワイン</h2>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">画像</th>
                                <th>商品名</th>
                                <th>価格</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($response_red->Items as $item)
                                <tr>
                                    <td class="text-center">
                                        <img src='<?php print htmlspecialchars($item->Item->smallImageUrls[0]->imageUrl, ENT_QUOTES, "UTF-8"); ?>' />
                                    </td>
                                    <td>
                                        <a href="<?php print htmlspecialchars($item->Item->itemUrl, ENT_QUOTES, "UTF-8"); ?>" target="_blank">
                                            <?php print htmlspecialchars($item->Item->itemName, ENT_QUOTES, "UTF-8"); ?>
                                        </a>
                                    </td>
                                    <td>
                                        &yen;<?php print htmlspecialchars(number_format($item->Item->itemPrice), ENT_QUOTES, "UTF-8"); ?>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        
            <div class="row">
                <div class="col-12">
                    <h2>人気の白ワイン</h2>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">画像</th>
                                <th>商品名</th>
                                <th>価格</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($response_white->Items as $item)
                                <tr>
                                    <td class="text-center">
                                        <img src='<?php print htmlspecialchars($item->Item->smallImageUrls[0]->imageUrl, ENT_QUOTES, "UTF-8"); ?>' />
                                    </td>
                                    <td>
                                        <a href="<?php print htmlspecialchars($item->Item->itemUrl, ENT_QUOTES, "UTF-8"); ?>" target="_blank">
                                            <?php print htmlspecialchars($item->Item->itemName, ENT_QUOTES, "UTF-8"); ?>
                                        </a>
                                    </td>
                                    <td>
                                        &yen;<?php print htmlspecialchars(number_format($item->Item->itemPrice), ENT_QUOTES, "UTF-8"); ?>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- Rakuten Web Services Attribution Snippet FROM HERE -->
        <a href="https://webservice.rakuten.co.jp/" target="_blank"><img src="https://webservice.rakuten.co.jp/img/credit/200709/credit_31130.gif" border="0" alt="楽天ウェブサービスセンター" title="楽天ウェブサービスセンター" width="311" height="30"/></a>
        <!-- Rakuten Web Services Attribution Snippet TO HERE -->
    </div>
    
@endsection
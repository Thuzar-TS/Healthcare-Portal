    <!-- <div>
        
        お名前 : {{$getComment->first_name}}  <br>
        お名前フリガナ : {{$getComment->last_name}}
        生年月日 : {{$getComment->birthday}}  <br>
        性別  : {{$getComment->gender}}  <br>
        郵便番号 : {{$getComment->postal}}  <br>
        住所 : {{$getComment->str_address}}  <br>
        番地以下 : {{$getComment->home_address}}  <br>
        電話番号 : {{$getComment->phone}}  <br>
        メールアドレス : {{$getComment->email}}  <br>
        資格 : {{$getComment->qualification}}  <br>
        実行可能日 : {{$getComment->workable_day}}  <br>
        リマーク  : {{$getComment->remark}}  <br>
    </div> -->
    <pre>
        [施設名」([施設No])様

        [サイト名]より求人への応募がありました。


        【求人タイトル】
        xxxxxx
        [求人番号]

        【ご応募された方の情報】
        お名前：{{$getComment->first_name}}
        ふりがな：
        生年月日：{{$getComment->birthday}}
        性別：{{$getComment->gender}}
        郵便番号：{{$getComment->postal}}
        都道府県：
        市区町村、番地（建物名)：{{$getComment->home_address}}
        電話番号：{{$getComment->phone}}
        メールアドレス：{{$getComment->email}}
        ご希望等：


        --------------
        [サイト名]

        〒163-0713
        東京都新宿区西新宿2-7-1小田急第一生命ビル13階 
        TEL：03-6911-???? FAX：03-6911-????

    </pre>
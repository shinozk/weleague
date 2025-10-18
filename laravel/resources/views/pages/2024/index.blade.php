@extends('layouts.design')
@section('title', 'FINASH　女子サッカー情報サイト | 2024パリオリンピック')
@section('description', 'FINASH　女子サッカー情報サイト 2024年パリオリンピック。パリオリンピック特集' )
@section('keywords', '女子サッカー, パリオリンピック, オリンピック代表, ニュース, 選手名鑑, データベース, なでしこリーグ, WEリーグ')
@section('contents')

<div id="app">
    <div class="container">
        <div class="middle">
            <div class="middle-right">
                <section>
                    <div class="section-name">
                        <h2>試合日程</h2>
                        <p style="margin-bottom: 64px">PickUp</p>
                        <div class="container" style="margin-bottom: 64px">
                            <a href="{{ route('2024.spain') }}">
                            <div class="card">
                                <h5>グループC第1戦　VSスペイン</h4>
                                <p>日本時間:2024.07.26(金)00:00〜02:00</p>
                                <p>放送予定:7.25(木)23:45 NHK</p>
                            </div>
                            </a>
                        </div>
                        <div class="container" style="margin-bottom: 64px">
                            <div class="card">
                                <h5>グループC第2戦　VSブラジル</h4>
                                <p>日本時間:2024.07.29(月)00:00〜02:00</p>
                                <p>放送予定:7.25(木)23:45 フジテレビ</p>
                            </div>
                        </div>
                        <div class="container" style="margin-bottom: 64px">
                            <div class="card">
                                <h5>グループC第3戦　VSナイジェリア</h4>
                                <p>日本時間:2024.08.01(木)00:00〜02:00</p>
                                <p>放送予定:7.25(木)23:45 NHK Eテレ</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="middle-left">
                <section>
                    <div class="video">
                        <div class="section-name">
                            <h2>パリオリンピック</h2>
                            <p>収集メンバー</p>
                        </div>
                        <div class="video-item">
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 121]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/yamashita_ayaka.jpg">
                                    <p>GK 1. 山下杏也加</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:71試合<br />
                                    なでしこリーグベストイレブン:5回<br />
                                    WEリーグ2021-22年:MVP<br />
                                    WEリーグベストイレブン:3回<br />
                                    WEリーグ優秀選手賞:3回
                                </div>
                            </div>
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 40]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/hirao_chika.jpg">
                                    <p>GK 18. 平尾知佳</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:9試合<br />
                                    Weリーグ優秀選手賞:1回
                                </div>
                            </div>
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 1948]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/kumagai_saki.jpg">
                                    <p>DF 4. 熊谷紗希</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:152試合<br />
                                    アジア年間最優秀選手賞:2019年<br />
                                    セリエA年間ベストイレブン:1回
                                </div>
                            </div>
                        </div>

                        <div class="video-item">
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 114]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/shimizu_risa.jpg">
                                    <p>DF 2. 清水梨紗</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:79試合<br />
                                    なでしこリーグベストイレブン:4回<br />
                                    WEリーグベストイレブン:1回
                                </div>
                            </div>
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 28]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/kitagawa_hikaru.jpg">
                                    <p>DF 13. 北川ひかる</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:11試合<br />
                                    WEリーグベストイレブン:1回<br />
                                    WEリーグ優秀選手賞:1回
                                </div>
                            </div>
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 48]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/minami_moeka.jpg">
                                    <p>DF 3. 南萌華</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:53試合<br />
                                    なでしこリーグベストイレブン:2回<br />
                                    WEリーグベストイレブン:1回<br />
                                    セリエA年間ベストイレブン:2回<br />
                                    AIC年間女子ベストイレブン:1回
                                </div>
                            </div>
                        </div>

                        <div class="video-item">
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 645]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/takahashi_hana.jpg">
                                    <p>DF 5. 高橋はな</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:27試合<br />
                                    WEリーグベストイレブン:1回
                                </div>
                            </div>
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 2190]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/koga_toko.jpg">
                                    <p>DF 6. 古賀塔子</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:9試合
                                </div>
                            </div>
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 35]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/seike_kiko.jpg">
                                    <p>MF 8. 清家貴子</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:22試合<br />
                                    なでしこリーグベストイレブン:1回<br />
                                    WEリーグベストイレブン:2回<br />
                                    WEリーグ得点王:1回<br />
                                    WEリーグ優秀選手賞:3回
                                </div>
                            </div>
                        </div>

                        <div class="video-item">
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 110]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/hasegawa_yui.jpg">
                                    <p>MF 14. 長谷川唯</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:85試合<br />
                                    なでしこリーグ敢闘賞:1回<br />
                                    なでしこリーグベストイレブン:4回<br />
                                    PFA年間ベストイレブン:1回
                                </div>
                            </div>
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 322]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/hayashi_honoka.jpg">
                                    <p>MF 16. 林穂之香</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:34試合
                                </div>
                            </div>
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 39]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/nagano_fuka.jpg">
                                    <p>MF 10. 長野風花</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:40試合<br />
                                    FIFA U-17女子ワールドカップMVP:1回<br />
                                    アジア年間最優秀ユース選手賞:1回<br />
                                    WEリーグ優秀選手賞:1回
                                </div>
                            </div>
                        </div>

                        <div class="video-item">
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 2033]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/miyazawa_hinata.jpg">
                                    <p>MF 7. 宮澤ひなた</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:38試合<br />
                                    WEリーグ優秀選手賞:2回<br />
                                    FIFA女子ワールドカップ得点王:1回
                                </div>
                            </div>
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 2716]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/fujino_aoba.jpg">
                                    <p>MF 15. 藤野あおば</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:23試合<br />
                                    WEリーグベストイレブン:2回<br />
                                    WEリーグ優秀選手賞:3回
                                </div>
                            </div>
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 2186]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/tanikawa_momoko.jpg">
                                    <p>MF 12. 谷川萌々子</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:5試合
                                </div>
                            </div>
                        </div>
                        <div class="video-item">
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 102]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/tanaka_mina.jpg">
                                    <p>MF 11. 田中美南</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:81試合<br />
                                    なでしこリーグ得点王:4回<br />
                                    なでしこリーグベストイレブン:6回<br />
                                    WEリーグ優秀選手賞:3回<br />
                                    WEリーグベストイレブン:3回
                                </div>
                            </div>
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 105]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/ueki_riko.jpg">
                                    <p>MF 9. 植木理子</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:36試合<br />
                                    WEリーグ得点王:1回<br />
                                    WEリーグベストイレブン:1回<br />
                                    WEリーグ優秀選手賞:2回
                                </div>
                            </div>
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 2217]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/hamano_maika.jpg">
                                    <p>FW 17 浜野まいか</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:11試合<br />
                                    AFC U-16女子選手権:得点王<br />
                                    FIFA U-20女子ワールドカップ:MVP<br />
                                    アジア女子年間最優秀ユース選手賞:1回
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video">
                        <div class="section-name">
                            <h2>予備メンバー</h2>
                        </div>
                        <div class="video-item">
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 1358]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/ohba_shu.jpg">
                                    <p>GK 22. 大場朱羽</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:1試合
                                </div>
                            </div>
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 198]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/moriya_miyabi.jpg">
                                    <p>MF 9. 守屋都弥</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:10試合<br />
                                    WEリーグベストイレブン:1回<br />
                                    WEリーグ優秀選手賞:2回
                                </div>
                            </div>
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 1370]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/ishikawa_rion.jpg">
                                    <p>DF 21 石川璃音</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:8試合<br />
                                    WEリーグベストイレブン:2回<br />
                                    WEリーグ優秀選手賞:2回
                                </div>
                            </div>
                        </div>
                        <div class="video-item">
                            <div class="sub-video" style="max-width:300px">
                                <a href="{{ Route('players.detail', ['player' => 2060]) }}">
                                    <img src="https://www.jfa.jp/nadeshikojapan/paris_olympic_2024_women/img/chiba_remina.jpg">
                                    <p>FW 19 千葉玲海菜</p>
                                </a>
                                <div>
                                    国際Aマッチ出場数:11試合<br />
                                    WEリーグ優秀選手賞:1回
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <section>
                    <div class="section-name">
                        <h2>日本代表選手特集</h2>
                    </div>
                    <div class="container">
                        <div class="slider-area">
                            <h2 style="margin-top:64px">GK 1. 山下杏也加</h2>
                            <p>
                                なでしこジャパンの守護神。2019年女子ワールドカップ、2023年女子ワールドカップ、2022年東京オリンピックと、3度の主要国際大会で日本のゴールマウスを守り続けてきた。
                                至近距離からのシュートストップには定評があり、幾度となくピンチを救ってきたスーパーセーブでチームを勝利に導く。 左足から繰り出される精度の高いフィードキックは攻撃の起点となり、相手チームを脅かす。
                                2021-2022シーズンにはWEリーグMVPに輝き、GK選手としては初の快挙を成し遂げた。 卓越した技術と勝負強さで、日本女子サッカー界を牽引する存在だ。
                            </p>
                            <ul class="kv-slider" style="margin-top:10px">
                              <li><img src="https://www.jfa.jp/national_team/img/member/photogallery/w/yamashita_ayaka/photo_01.png" alt="image" class="hover"></li>
                            </ul>

                            <h2 style="margin-top:64px">DF 2. 清水梨紗</h2>
                            <p>
                                2019年女子ワールドカップ、2023年女子ワールドカップ、2021年東京オリンピックと、3度の主要国際大会でなでしこジャパンの不動の右サイドバックとして活躍。 豊富なスタミナで90分間精力的に攻守を繰り広げ、右サイドの仕事人としてチームを支える。華奢な体格からは想像できないほど粘り強くアグレッシブな守備を持ち味とし、相手アタッカーを翻弄する。 長谷川唯とは日テレ・ベレーザ時代からの盟友であり、抜群のコンビネーションで相手ディフェンスラインを崩し、攻撃の起点となる。 今シーズンのウェストハムでの活躍が評価され、来シーズンは長谷川唯が所属するマンチェスター・シティへの移籍が決定。なでしこジャパン不動の右サイドバックとして更なる飛躍が期待される。
                            </p>
                            <ul class="kv-slider" style="margin-top:10px">
                              <li><img src="https://www.jfa.jp/national_team/img/member/photogallery/w/shimizu_risa/photo_01.png" alt="image" class="hover"></li>
                            </ul>


                            <h2 style="margin-top:64px">DF 4. 熊谷紗希</h2>
                            <p>
                                2011年ワールドカップ優勝メンバーの1人。ワールドカップは計4大会。オリンピックは2大会を経験している世界をしるなでしこの精神的支柱。
                                的確なポジショニングと対人守備で欧州のビッグクラブを渡り歩き、日本、フランス、ドイツ、イタリアの4カ国でリーグタイトルを獲得、チャンピオンズリーグも5回制覇している。
                                2013-2014年、2018-2019年シーズンはDFながら、バロンドール賞候補にノミネートされている世界レベルの選手である。
                            </p>
                            <ul class="kv-slider" style="margin-top:10px">
                              <li><img src="https://www.jfa.jp/national_team/img/member/photogallery/w/kumagai_saki/photo_01.png" alt="image" class="hover"></li>
                            </ul>

                            <h2 style="margin-top:64px">DF 3. 南萌華</h2>
                            <p>
                                2020年以降、熊谷紗希選手とのコンビを組んでなでしこジャパンのセンターバックとしてレギュラーに定着している。 
                                高さを活かした強固な守備と冷静な判断でボールを奪い切るスライディングタックルが持ち味の選手だ。
                                得意の空中戦で相手を圧倒し、正確なヘディングシュートを決める。
                                コーナーキックの際には、なでしこジャパンの攻撃パターンの一つとして不可欠な存在となっている。
                                所属チームのASローマのリーグ連覇に貢献しており、今季のせりエAベストイレブンに選出されている。
                            </p>
                            <ul class="kv-slider" style="margin-top:10px">
                              <li><img src="https://www.jfa.jp/national_team/img/member/photogallery/w/minami_moeka/photo_01.png" alt="image" class="hover"></li>
                            </ul>

                            <h2 style="margin-top:64px">DF 13. 北川ひかる</h2>
                            <p>
                                今年2月、パリオ五輪のアジア最終予選で負傷選手の追加招集として左ウイングバックに抜擢され、見事な活躍で一躍なでしこジャパンのレギュラー候補に躍り出た。 今、最も勢いに乗っている選手と言えるだろう。
                                本番でも左サイドの先発として活躍する可能性は高い。 国際主要大会への出場は初となるが、持ち前の積極的な攻撃参加でオリンピックでも観客を魅了してくれるだろう。
                                ドリブル突破と高精度のクロスを得意とし、積極的に1対1を仕掛ける姿はまさに見どころだ。
                                さらに、左足の高いキック精度を活かしたフリーキックやロングシュートも武器であり、オリンピックでも攻撃面で大きく貢献してくれることが期待される。
                            </p>
                            <ul class="kv-slider" style="margin-top:10px">
                              <li><img src="https://www.jfa.jp/national_team/img/member/photogallery/w/kitagawa_hikaru/photo_01.png" alt="image" class="hover"></li>
                            </ul>

                            <h2 style="margin-top:64px">DF 6. 古賀塔子</h2>
                            <p>
                                18歳とは思えないほどの高さ、スピード、テクニック、そして落ち着きとクレバーさを兼ね備えた守備力で、ディフェンスラインを支える。 昨夏のワールドカップではトレーニングパートナーとして帯同していたが、今回のオリンピックでは晴れて選手として選出された。
                                オリンピック期間中にさらなる覚醒を遂げる可能性を秘め、この大会で最も注目すべき選手の1人だ。
                            </p>
                            <ul class="kv-slider" style="margin-top:10px">
                              <li><img src="https://www.jfa.jp/national_team/img/member/photogallery/w/koga_toko/photo_01.png" alt="image" class="hover"></li>
                            </ul>

                            <h2 style="margin-top:64px">MF 7. 宮澤ひなた</h2>
                            <p>
                                前回ワールドカップでは驚異的な5得点を挙げ、大会得点王に輝いた。 スピードを活かした高速ドリブル、狭いスペースでもボールを奪われない高いキープ力、そして状況判断に優れたパスセンスなど、サッカーIQの高いプレーでファンを魅了する。
                                FW、サイドハーフ、ボランチと、攻撃的なポジションから守備的なポジションどこでもこなせるユーティリティ性も持ち味だ。 2022-23シーズンには所属クラブのマンチェスター・ユナイテッドで圧倒的なパフォーマンスを披露し、バロンドール候補にもノミネートされた。
                            </p>
                            <ul class="kv-slider" style="margin-top:10px">
                              <li><img src="https://www.jfa.jp/national_team/img/member/photogallery/w/miyazawa_hinata/photo_01.png" alt="image" class="hover"></li>
                            </ul>

                            <h2 style="margin-top:64px">MF 14. 長谷川唯</h2>
                            <p>
                                なでしこジャパンの心臓、ゲームメーカーとして君臨するMF。
                                果敢なドリブル突破と広い視野から繰り広げられる精度の高いパスは攻撃の起点となり、試合終盤になっても落ちないスタミナで最後まで相手を追い回す粘り強い守備も光る。
                                プレッシャーのかかる場面でもプレイの質が落ちずにヨーロッパでも通用する当たりの強さも魅力で世界屈指の実力を持つ中盤の選手だ。
                                2022-23シーズンにはバロンドール候補にも選出されるなど、国内外で高い評価を受ける。 まさになでしこジャパンの屋台骨を支える存在と言えるだろう。
                            </p>
                            <ul class="kv-slider" style="margin-top:10px">
                              <li><img src="https://www.jfa.jp/national_team/img/member/photogallery/w/hasegawa_yui/photo_01.png" alt="image" class="hover"></li>
                            </ul>

                            <h2 style="margin-top:64px">FW 9. 植木理子</h2>
                            <p>
                                「利き足は頭」と豪語するほどの圧倒的なヘディング能力を武器にゴールを量産するストライカー。 ゴール前に鋭く飛び込み、常に向上心を持ち続ける姿勢と泥臭さでゴールをこじ開ける。
                                スピード、パワー、そして優れたアジリティを兼ね備え、まさに現代的なストライカーの体現者と言えるだろう。 今シーズン移籍したウエストハムでは、ファン投票による最優秀若手賞を受賞するなど、瞬く間にサポーターの心を掴んだ。常に観客を熱狂させるエネルギッシュなプレイは、彼の最大の魅力だ。
                            </p>
                            <ul class="kv-slider" style="margin-top:10px">
                              <li><img src="https://www.jfa.jp/national_team/img/member/photogallery/w/ueki_riko/photo_03.png" alt="image" class="hover"></li>
                            </ul>

                            <h2 style="margin-top:64px">FW 9. 浜野まいか</h2>
                            <p>
                                2022年U-20ワールドカップでは、ベスト4の試合でブラジル相手にミドルシュートを決め、見事大会MVPに輝きました。 その後もパリ五輪前哨戦のガーナ戦では1ゴール1アシストと大活躍し、日本代表にとってなくてはならない存在となっていた。
                                以前からゴールへの飛び出しとシュートの正確性は特筆すべき能力だったが、所属チームのチェルシー移籍以降はフィジカル面も一回り強化されたように感じる。
                                ニュージーランド戦でのノールックパスによるアシストは、ゴールを直接演出する高い戦術眼を証明した。
                                まさになでしこジャパンのシンデレラガールと言える彼女。今後の更なる活躍が期待される。
                            </p>
                            <ul class="kv-slider" style="margin-top:10px">
                              <li><img src="https://www.jfa.jp/national_team/img/member/photogallery/w/ueki_riko/photo_03.png" alt="image" class="hover"></li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <section>
    </section>
</div>
@endsection
@section('script')
@endsection

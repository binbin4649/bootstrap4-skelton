# baserCMS4 THEME [bootstrap4-skelton]

bc_sampleをベースに、bootstrap4を使って作ったスケルトンテーマです。
独自CSSをほとんど書かず、bootstrapのclassだけを使ってデザイン（のつもり）しています。
* フラッシュメッセージ、エラーメッセージだけ独自CSS書いてます。


###　読み込んでいるcss,js一覧

#### CSS
- bootstrap/4.1.0
- fontawesome.com/releases/v5.0.10
- jpn.min.css

#### JS
- jquery-3.3.1.min.js
- popper.js/1.14.0
- bootstrap/4.1.0


### グローバルメニューは2階層まで表示します。


### ブログのコメント機能は、コメントアウトしてます。
$this->BcBaser->element('blog_comments')
jquery3を使用している影響で、ブログのコメント機能が使えません。
app/webroot/theme/bootstrap4/Blog/js/blog_comments_scripts.js
jsはオーバーライトできない？
コピーしてjquey3用に変えてみたけど、オーバーライトしないようなので諦めた。
とりえず残してある。


### group_inline で横並びフォーム
[お問い合わせ] メールフィールド一覧　から各フィールドの編集画面を開き、オプションを開いて、
オプションに「group_inline」と入力すると、そのグループフィールドのフォームが横並びになります。
横並びにするグループフィールド全部に、「group_inline」を入力してください。
全部に入力しないと確実にレイアウトが崩れます。仕様です。


### 既存のclassはほとんど削除
View からも使っていない class はほとんど削除しました。(使ってない class を出力するのも嫌だったので、)


##### skelton
スケルトンと名称に付けているのは「中途半端に公開してごめんなさい。」という意味も含まれています。


### ライセンス MIT
ご自由にどうぞ。

# she is フロント設計仕様

## 0.フロント開発環境
- node v6
- gulp

```
$ cd src
$ npm i
$ gulp
```
gulpのデフォルトタスク（[7-2](https://github.com/cinra/sheis/wiki/_new#7-2%E3%82%BF%E3%82%B9%E3%82%AF)）で、ローカルサーバーが立ち上がります。

http://localhost:8500/

node-sassがコケる場合

```sh
$ npm update node-sass@latest
$ npm rebuild node-sass
```

### 0-1.Git branch

- feature/front
  - feature/front（フロント構築のmaster）
  - feature/front_{name}（フロント構築ブランチ）

## 1.ディレクトリ構造
### フロント開発ディレクトリ

```
src
  ├ _src
  │  ├ sass
  │  ├ js
  │  ├ img
  │  ├ fonts
  │  └ tmpl
  │    ├ partials
  │    │  └ {{共通パーツ}}.ejs
  │    └ {{各ページ}}.ejs
  │    └ index.ejs //pageリスト
  └ _dist
    ├ css
    │ └ fonts
    ├ js
    ├ img
    └ *.html
```


### 書き出しディレクトリ

```
/www/html/wp/wp-content/themes/uplink/
└ assets/
  ├ img/
  ├ css/
  │ └ style.css / style.min.css
  └ js/
    │ script.js / script.min.js
    └ libs
      └ {{ライブラリ}}
```

---

## 2.マークアップ
- ejsを使用してHTML5にgulpでコンパイルする。

### 2-1.共通箇所のinclude化・ファイルのモジュール化
- ejsのincludeを使用

#### 2-1-1. head / foot
- `_src/ejs/partial/`に格納

### 2-2.マークアップのフレーム
下記を想定

```
body
  └ .l-wrapper
    ├ .l-header （ここから上 サイト共通 head.ejs / head.php）
    ├ .l-container（テンプレ固有のclassを付与 / ページによって背景色がここから違う）
    │ ├ .l-billboard （あったりなかったり）
    │ ├ .l-content
    │ │ ├ .l-main
    │ │ └ .l-side （あったりなかったり）
    │ └ .l-aside（付属コンテンツ latest/Recommendedなど）
    └ .l-footer （ここから下サイト共通 foot.ejs / foot.php）
```

---

## 3.CSS
SASS（.scss）→ css

### 3-1.class命名規則
- スタイル付けにIDは使用しない
- 必要に応じて、適切なprefixを付ける
  - レイアウト要素：.l-xxx
  - モジュール要素 （ボタン、見出しなど）：.xxx（プレフィックスなし）
  - jsのトリガーになる要素：.js-xxx
  - 状態の定義：.is-xxx
  - カラー指定：.c-xxx
- 親子関係は`-`（ハイフン）、兄弟関係/種類は`_`（アンダースコア）で連結する
  - ex.) `.panel-text` panelに内包されるtext / `.panel_small-text` smallという種類のpanelに内包されるtext
- 基本的に端的な単語で表現するが、要素に複数単語表現が必要な場合は、単語間の連結は記号を使用せず、キャメルケースを使用する。
- 略語は基本的に使用しない

### 3-2.SASSファイルの分割
- パーシャルファイルをimportで一つのファイルに。全ページ共通読み込みファイルとする。

#### 3-2-1._base.scss
`body`、`a`など、タグ名に直接指定するスタイルを記述する。

#### 3-2-2._var.scss
サイト全体で使用する変数を格納する。トランジション速度や、規定の幅、色など。

#### 3-2-3._font.scss
フォントの読み込み、iconフォントの読み込みを記載。
フォント・iconフォント関連mixinもここに。

#### 3-2-4._helper.scss
ヘルパー用classを記載。

#### 3-2-5._mixin.scss
mixinを記載。

#### 3-2-6._reset.scss
スタイルリセット用。

#### 3-2-7.module/
各モジュール別にsassファイルを格納。

### 3-3.CSSスプライト画像
gulp-spritesmithプラグインを使用して作成

### 3-4.CSSフレームワーク
使用しない

### 3-5.レスポンシブ / ブレイクポイント
|画面サイズ|表示|注意点|
|---|---|---|
|-767px|SP||
|768-1023px|PC|画面サイズにフィットした縮小表示
|1024px-|PC||

- 〜767px のSPレイアウトは、320px = window.width / 基本単位はpx
- 768〜1023px のPCレイアウトは、1280pxを基準とした単位vwで画面サイズに沿って縮小

---

## 4.Javascript

### 4-1.jsライブラリ
jQuery


---

## 5.画像

---

## 6.font
### 6-1.使用Webフォント

### 6-2.fontの指定
`_font.scss`に指定されているmixin（font-family/font-weight等一括で指定）を各箇所で呼び出す。

ex.)
```
.text_letter {
  @include $f_noto;
  font-size: 15px;
}

```

---


## 7.タスクランナー
gulpを使用

### 7-1.プラグインについて
詳細はpackage.jsonに記載

### 7-2.タスク
**default**
`$ gulp`
各ファイルのwatchを行う

**画像圧縮してコピー**
`$ gulp imgmin`
srcディレクトリ内の画像を圧縮してテーマディレクトリへコピーする


## 8.対応ブラウザ
### PC
- win：IE11以降 / Chrome最新 / Firefox最新
- Mac：safari最新 / Chrome最新 / Firefox最新

### スマホ
- AndroidOS5以降：Chromeブラウザ
- iOS10以降：safari

## 9.中国からの閲覧対策
対応しない

## 10.印刷対応
対応しない

## 11.その他機能

### 11-1.PC / SP共通

### 11-2.PC

#### 11-2-1.ヘッダー内searchアニメーション




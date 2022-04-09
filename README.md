# mynote

## 開発環境構築

```
# init
$ git clone ~
$ cd mynote
$ make install

# browser
http://localhost:8080/
```

---

## make コマンド

### 環境構築

```
$ make install
```

### コンテナ起動

```
$ make up
```

### コンテナ停止

```
$ make down
```

### コンテナ、イメージ削除

```
$ make destory
```

### キャッシュクリア

```
$ make cache
```

### npm run

```
$ make npm-run
```

### npm run watch

```
$ make npm-watch
```

### マイグレーション

```
$ make migrate
```

### マイグレーション　ロールバック

```
$ make migrate-rollback
```

### マイグレーション（再構築）

**データが消去されます**

```
$ make migrate-fresh
```

### Bash起動

```
$ make bash
```

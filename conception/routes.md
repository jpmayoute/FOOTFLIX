# routes

## Front

| URL | VERB | Controller | action | comments |
|---|---|---|---|---|
| `/` | `GET` | `PlayerController` | `browse` | list all player |
| `/player/{id}` | `GET` | `PlayerController` | `read` | Show one player |
| `/player/{id}/comment` | `GET`, `POST` | `PlayerController` | `addComment` | display and process add comment form |
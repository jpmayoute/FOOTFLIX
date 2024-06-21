# Le MCD V1

:
:
DecisifPass : decisif_pass_number
Position : position_name
Country : country_name
User : pseudo

Club : club_name,
played, 1N Player, 0N Club
statistical, 1N Player, 0N DecisifPass
is tagged, 11 Player, 0N Position
is of nationality, 11 Player, 0N Country
comments, 0N User, 11 Comment

associate, 1N Club, 0N PlayerClubYear
PlayerClubYear : year
play, 1N Player, 0N PlayerClubYear
Player : firstname, lastname, date_of_birth, player_picture
commented, 0N Player, 11 Comment
Comment : code_rating, content

:
:
:
achieved, 1N Player, 0N Trophy
stat, 1N Player, 0N Goals
Goals : goals_number

:
:
:
Trophy : trophy_name, year
:
:

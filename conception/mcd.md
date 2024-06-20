# Le MCD V1


associate, 1N Club, 0N PlayerClubYear
Club : club_name,
played, 1N Player, 0N Club
is tagged, 11 Player, 0N Position
Position : position_name
User : pseudo

PlayerClubYear : Year
play, 1N Player, 0N PlayerClubYear
Player : fistname, lastname, date of birth, player_picture
commented, 0N Player, 11 Comment
Comment : code _rating, content
comments, 0N User, 11 Comment

:
statistical, 1N Player, 0N DecisifPass
stat, 1N Player, 0N Goals
is of nationality, 11 Player, 0N Country
Country : country_name
:

:
DecisifPass : Decisif_pass_number
Goals : goals_number
:
:
:

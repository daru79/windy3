### NAWIGACJA ###
**ls** 					-> wylistowanie plików i katalogów

**ls -a**					-> opcja ta pokazuje te ukryte

**ls -l**					-> opcja ta pokazuje wszystkie szczegóły

**ls -t		**			-> opcja ta porządkuje pliki i katalogi wg. czasu modyfikacji

**ls -alt	**				-> użycie ww. opcji jako jedna opcja

**pwd **					-> (print working directory) wyświetlenie aktualnej ścieżki

**cd [nazwa_katalogu]**			-> (change directory) zmiana katalogu

**cd .. **					-> wyjście o jeden katalog w górę

**cd ../../action	**			-> wyjście o dwa poziomy wyżej i wejście do danego katalogu

**mkdir [nazwa_katalogu]**			-> utworzenie katalogu

**touch [nazwa_pliku]	**		-> tworzy nowy plik

**cp frida.txt lincoln.txt	**	-> kopiuje zawartość pierwszego pliku do drugiego

**cp biopic/cleo.txt hist		**	-> kopiuje z katalogu biopic plik cleopatra.txt do katalogu historical

**cp biopic/ray.txt biopic/not.txt hist	**-> kopiuje z 2 źródeł do danego katalogu

**cp * satire		**		-> kopiuje wszystkie pliki do wybranego katalogu

**cp m*.txt scifi		**		-> kopiuje wszystkie pliki zaczynające się na 'm' z rozszerzeniem '.txt'

**mv superman.txt superhero**		-> przenosi plik do katalogu

**mv batman.txt spiderman.txt	**	-> zmienia nazwę pliku

**rm waterboy.txt		**		-> usuwa dany plik

**rm -r slapstick		**		-> dzięki opcji '-r' można usunąć katalog

**ln -s file.txt symlink.txt** -> utworzenie soft linku


### MANIPULACJA ###
**echo "Hello"	**			-> wyświetla ciąg znaków "Hello"

**echo "Hello" > hello.txt	**	-> tworzy plik i wprowadza do niego ciąg znaków | '>' oznacza przekierowanie do pliku jako docelowego medium

**cat hello.txt		**		-> wyświetla zawartość pliku

**cat oceans.txt > continents.txt	**	-> przeniesienie i nadpisanie zawartości jednego pliku do drugiego | czyli standardowe wyjście z pliku I jest przekierowane do standardowego wejścia pliku II, '>' nadpisuje całą dotychczasową zawartość nową zawartością

**cat glaciers.txt >> rivers.txt	**	-> przeniesienie zawartości jednego pliku do drugiego bez nadpisania

**cat < lakes.txt	**			-> torżsame z 'cat lakes.txt'

**|**					-> to połaczenie bierze jako argument to co jest na standardowym wyjściu po lewej i przekazuje jako argument jako standardowe wejście funkcji po prawej

**cat volcanoes.txt | wc	**		-> przelicza ile jest wierszy, słów i znaków

**cat volc.txt | wc | cat > islands.txt**	-> j.w. i dodatkowo wprowadza te informacje do pliku 'islands.txt'

**sort lakes.txt**				-> sortuje to co namazane w pliku :)

**cat lakes.txt | sort > sorted-lakes.txt**	-> pobiera zawartość pliku 'lakes.txt', przekazuje ją do funkcji 'sort', następnie tworzony '>' jest plik sorted-lakes.txt do którego przekazano posortowaną zawartość pliku 'lakes.txt'

**uniq deserts.txt**			-> usuwa duplikaty

sort des.txt | uniq > uniq-deserts.txt	-> sortuje plik 'des.txt' i przekazuje zawartość do funkcji 'uniq', która usuwa duplikaty i przekierowywuje stanadardowe wyjście do tworzonego pliku uniq-deserts.txt

**grep Mount mountains.txt**		-> funkcja 'grep' (global regular expression print) szuka wzorca, np. 'Mount'. Funkcja ta jest 'CASE SENSITIVE'

**grep -i Mount mountains.txt	**	-> opcja '-i' powoduje, że fukcja przestaje być 'CASE SENSITIVE'

**grep -R Arctic /home/ccuser/work/geo**	-> szuka wybranego wyrażenia we wszystkich plikach w podanej lokalizacji

**sed 's/snow/rain/' forests.txt	**	-> (stream editor) jest podobny do 'znajdź i zastąp' i tak: 's' to jest 'substitution', czyli zastąpienie, 'snow' to tekst do znalezienia, 'rain' to tekst do zastąpienia

**sed 's/snow/rain/g' forests.txt	**	-> j.w. z tą różnicą, że 'g' odpowiada za znalezienie wszystkich pasujących wyrażeń, a nie tylko pierwszego w wierszu

### ŚRODOWISKO ###
**nano hello.txt	**			-> otwiera plik 'hello.txt' w edytorze 'nano' | CTRL+O zapis, ENTER do zapisania pliku, CTRL+X wyjście
**clear		**			-> czyści ekran (jak 'cls' w DOS'ie :P)

**nano ~/.bash_profile		**	-> w domowym katalogu '~' tworzy ukryty plik '.bash_profile', w którym można zapisać różne stuff'y

**source ~/.bash_profile	**		-> aktywuje zmiany w '~/.bash_profile' dla bieżącej sesji bez konieczności restartu BASH'a

**alias pd="pwd"		**		-> dodanie własnego skrótu do funkcji 'pwd'

**alias hy="history"	**		-> j.w. jeno do historii wprowadzonych komend

**alias ll="ls -la"	**		-> wyświetla pliki i katalogi ukryte i ze szczegółami

**export USER="Jane Doe"	**		-> tworzy zmienną USER i przypisuje jej wartość

**export PS1=">> "**			-> zmiana znaczka na początku linii

**echo $HOME	**			-> zmienna wyświetlająca ścieżkę do katalogu domowego

**echo $PATH	**			-> lista katalogów oddzielona dwukropkiem

**/bin/pwd**				-> wywołanie komendy 'pwd' z katalogu ze skryptami

**/bin/ls	**				-> wywołanie komendy 'ls' z katalogu ze skryptami

**env | grep PATH		**		-> wywołanie tablicy zmiennych środowiskowych, przekazanie jej do funkcji szukającej dopasowań (w tym wypadku PATH) i wyświetlenie ich na ekran

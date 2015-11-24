# Windy `ver. 3.0`

Blog with CMS build with CodeIgniter 2.2.5 (ver. 2)

*Requires [CodeIgniter](http://www.codeigniter.com/)*

**1. Powiazanie serwera WWW z GitHub'em**

* Tworzysz nowe repo;
* W terminalu laczysz utworzone wczesniej repo z serwerem WWW:

```
  $ git init
  $ git remote add origin https://github.com/daru79/CI_pattern.git
```

* Za pomoca FTP przegrywasz pliki na serwer WWW
* Przegrane pliki dodajesz do powiazanego repo z pkt. 2:

```
  $ git add -A
  $ git commit -m "tekst komentarza"
  $ git push -u origin master
```

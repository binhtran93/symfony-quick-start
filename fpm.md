Nowadays, CGI is basically unused, insecure and extremely low performance, more and more use of Web built-in extensions, fast CGI. For example, Microsoft iis’s ISAPI, apache’s PHP module and nginx‘s php–cgi. CGI, built-in modules, and fast CGI are the three best performances that belong to fast_cgi with the fastest speed, but require additional processes. Let’s look at the differences between CGI and FASTCGI.

CGI Introduction:

CGI was widely used in 2000 or earlier. Previously, web servers usually only handled static requests. What if they encountered a dynamic request? According to the content of the request, the web server will then fork a new process to run external C programs (or Perl scripts…), the process will return the processed data to the web server, and finally the web server will send the content to the user, and the process just fork will also exit. If the next time the user requests to change the dynamic script, the web server forks a new process again, and goes on again and again.

Introduce the web built-in modules:

Later, a more advanced way emerged that web servers could have built-in Perl interpreters or PHP interpreters. That is to say, the way these interpreters are made into modules, the web server will start these interpreters at startup time. When new dynamic requests come in, the web server parses these Perl or PHP scripts by itself, which saves fork a process and improves efficiency.

Introduction of fastcgi:

The way of fastcgi is that when the web server receives a request, it does not fork a process again (because the process starts at the start of the web server and does not quit). The web server passes the content directly to the process (interprocess communication, but fastcgi uses other methods, TCP communication). The process processes the request and processes the result. Return to the web server and wait for the next request instead of quitting.

The difference tables between fastcgi and cgi:

What's the difference between fastcgi and CGI

For example, the server now has 100,000 words. Each time the client sends a string and asks how many words are prefixed with this string. Then you can write a program that builds a tree of tries and then goes directly to the trie every time a user requests it. But if we use cgi, the trie will disappear after the request is finished. When we start the process next time, we need to build a new trie tree, which is too inefficient. In the way of fast cgi, the trie tree is established at the start of the process, and then the specified prefix can be queried directly on the trie tree.


CGI
CGI runs an application which works with the requested script for every HTTP request. After the application finishes processing and returns the output data, CGI terminates the application process. Within the next request CGI runs the application.

Every next start might use more time and resources than generating the output data itself.

The more processes are running, the more resources such as RAM or computing power will be exploited. The webpage loading time is now defined not only by the server load, but also from application load time.

FastCGI
What makes a difference from CGI is that with FastCGI the running process of the application lasts longer and it is not immediately terminated. After the application finishes processing and returns the output data, the process is not terminated and is being used for processing further requests. This results in reduced server load and less page loading time.

Another difference is that FastCGI can be used on a remote server, a different one from the web server.

The CGI applications main function is to process the HTTP request data and to return a HTTP response. This is the so called "Responder" role in FastCGI. Besides, an application can also perform the roles of Authorizer and Filter.


https://www.inmotionhosting.com/support/website/php-fpm-the-future-of-php-handling/
https://geekflare.com/php-fpm-optimization/
https://www.haproxy.com/blog/load-balancing-php-fpm-with-haproxy-and-fastcgi/
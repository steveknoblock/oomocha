
Modufy is an experiment in learning how Python-style automatic loading of modules works.

I wanted to learn how the 'import' statement in Python worked by reverse-engineering it
in PHP.

For most of its life, PHP has supported inclusion of code files, however, having its origins
in a non-OOP language, and slowly adding them over time, there has not been much support
for modular software design. Perl is known for its modules and the CPAN module archive.
Python is also known for its module library and the ease with which modules can be
imported.

Importing a module does not just include code, but stands it up as an instantiated class
ready for the programmer to use.



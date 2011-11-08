\NeedsTeXFormat{LaTeX2e}[1995/12/01]
\ProvidesClass{order}[2011/09/25 v0.01 Pizza Proxy Order Class]

\LoadClass{article}

\RequirePackage[a4paper]{geometry}
\geometry{left=5mm,right=5mm,top=5mm,bottom=5mm}
\RequirePackage[utf8]{inputenc} 
\RequirePackage{eurosym}
\RequirePackage{lmodern}
\RequirePackage[T1]{fontenc}
\RequirePackage[ngerman]{babel}
\RequirePackage{longtable}
\RequirePackage{setspace}
\RequirePackage{amssymb}
\RequirePackage{forloop}

% My commands
\linespread{0.5}

\newcounter{ct}
\newcounter{max}

\makeatletter
	%<Name> <Street name + house number> <phone>
	%In order to match the old system default the streetname and housenumber is included in the name
	\newcommand{\header}[2]{	
		\Large
		\changefont{phv}{b}{sc}
		Bestellung bei #1, Tel.:\large\hspace{-6pt}\changefont{phv}{b}{sc}#2
		\Large
		\vspace{1cm}
	}
	%Add check boxes
	\newcommand{\addboxes}[1]{
		\setcounter{ct}{0}
		\setcounter{max}{#1}
		\stepcounter{max}
		\forloop{ct}{1}{\value{ct} < \value{max}}
		{$\square$}
	}
	%Change font
	\newcommand{\changefont}[3]{\fontfamily{#1} \fontseries{#2} \fontshape{#3} \selectfont}
	%Change font size
	\newcommand{\fs}[2]{\fontsize{#1}{#2}\selectfont}
	%Begin order
	\newcommand{\startorder}{		
		\changefont{phv}{m}{n}
		\setlength\LTleft{0pt}
		\setlength\LTright{0pt}
		\begin{longtable}{@{\extracolsep{0mm}}lrrc}				
		\changefont{phv}{b}{sc}Bezeichnung&\changefont{phv}{b}{sc}Preis&\changefont{phv}{b}{sc}Total&\changefont{phv}{b}{sc}Erhalten\\[10pt]
		\hline\\[-6.5pt]
	}
	%Finish order
	\newcommand{\finishorder}{		
		\end{longtable}
	}
	%<quantity> <order code> <name> <price> <total>
	\newcommand{\addorder}[5]{		
		\\
		\hline{}
		\\	
		\changefont{phv}{b}{n}#1x\hspace{-6pt}\changefont{phv}{m}{n}Nr. #2 "#3"&#4 &#5 &\addboxes{#1}\\[10pt]
	}
	%<order code> <Name> <phone>
	\newcommand{\alternative}[3]{
		\small		
		\changefont{phv}{m}{sl}
		Nr.#1 bei #2 (#3)&&&\\
	}
	%Total
	\newcommand{\total}[1]{		
		\hline\hline\\
		\changefont{phv}{b}{sc}\hspace{12pt}Summe&&#1 &\\[10pt]
	}
	%Begin summary
	\newcommand{\startsummary}{
		\clearpage		
		\huge
		\changefont{phv}{b}{sc}
		Bestellungen
		\vspace{10mm}
		\Large
		\changefont{phv}{m}{n}
		\setlength\LTleft{0pt}
		\setlength\LTright{0pt}
		\begin{longtable}{@{\extracolsep{0mm}}clrc}
		\changefont{phv}{b}{sc}Nr.&\changefont{phv}{b}{sc}ProxyPizza&\changefont{phv}{b}{sc}Preis&\changefont{phv}{b}{sc}Ausgegeben\\[10pt]		
		\hline\hline	
	}
	%New Order - call it once before add order
	\newcommand{\neworder}[1]{\hline\\#1}
	%Add order
	\newcommand{\additem}[4]{		
		&\changefont{phv}{b}{n}#1x\hspace{-6pt}\changefont{phv}{m}{n} Nr. #2 "#3"&#4 &\huge$\square$\Large\\[6pt]		
	}
	\newcommand{\calc}[1]{		
		\cline{3-3}\\[-7pt]
		\cline{3-3}\\
		&&#1 &\\[6pt]}
	%Finish summary
	\newcommand{\finishsummary}{
		\hline\hline		
		\end{longtable}
	}

\makeatother

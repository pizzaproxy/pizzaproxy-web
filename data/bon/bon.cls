\NeedsTeXFormat{LaTeX2e}[1995/12/01]
\ProvidesClass{bon}[2011/09/25 v0.01 Pizza Proxy Bon Class]

\LoadClass[14pt]{article}

\RequirePackage{graphicx}
\RequirePackage{eurosym}
\RequirePackage{lmodern}
\RequirePackage[T1]{fontenc}
\RequirePackage{pdfpages}
\RequirePackage{calc}
\RequirePackage{textcomp}

\usepackage{longtable}

\pagestyle{empty}

% My commands


\makeatletter
	\newcommand{\code}[1]{\def \@code{#1}}
    % Generates the header
	\newcommand{\head} {
		\begin{minipage}[h!]{0.4\textwidth}
			\flushleft
			\includegraphics[height=\textwidth]{pizzaproxy_logo.pdf}			
		\end{minipage}
		\begin{minipage}[h!]{0.5\textwidth}			%0,6 instead
			\centering
			\fontsize{34pt}{0}
            \selectfont
			\changefont{pcr}{b}{n}
            \@code
		\end{minipage}		
	}
	\newcommand{\changefont}[3]{\fontfamily{#1} \fontseries{#2} \fontshape{#3} \selectfont}	
	\newcommand{\startorder}{
		\begin{longtable}{lp{4cm}}
    }
	\newcommand{\addorder}[3]{
        \changefont{cmss}{bx}{n}\large#1x\hspace{-3mm}\changefont{cmss}{bx}{n}\large#2&
        \changefont{cmss}{bx}{n}\large#3 
        \\
    }
	\newcommand{\finishorder}{\end{longtable}}
	\newcommand{\total}[1]{		
		\\
		\changefont{cmss}{bx}{n}\large TOTAL&\changefont{cmss}{bx}{n}\large#1
	}
    \newcommand{\beginfooter}{
        \begin{longtable}{c}
    }
    \newcommand{\addfooter}[1]{
        \changefont{pcr}{b}{sc}\normalsize#1\\
    }
    \newcommand{\finishfooter}{\end{longtable}}
\makeatother

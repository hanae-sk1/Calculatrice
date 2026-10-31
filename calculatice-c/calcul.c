#include <stdio.h>

int main() {
    float num1, num2, resultat;
    char operation;

    printf("--- Calculatrice Simple en C ---\n");
    
    printf("Entrez le premier nombre : ");
    scanf("%f", &num1);

    printf("Entrez l'operateur (+, -, *, /) : ");
    scanf(" %c", &operation);

    printf("Entrez le deuxieme nombre : ");
    scanf("%f", &num2);

    switch (operation) {
        case '+':
            resultat = num1 + num2;
            printf("Resultat : %.2f + %.2f = %.2f\n", num1, num2, resultat);
            break;
        case '-':
            resultat = num1 - num2;
            printf("Resultat : %.2f - %.2f = %.2f\n", num1, num2, resultat);
            break;
        case '*':
            resultat = num1 * num2;
            printf("Resultat : %.2f * %.2f = %.2f\n", num1, num2, resultat);
            break;
        case '/':
            if (num2 != 0) {
                resultat = num1 / num2;
                printf("Resultat : %.2f / %.2f = %.2f\n", num1, num2, resultat);
            } else {
                printf("Erreur : Division par zero impossible !\n");
            }
            break;
        default:
            printf("Erreur : Operateur invalide !\n");
    }

    return 0;
}
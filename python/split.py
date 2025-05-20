import sys
from pypdf import PdfReader, PdfWriter

def print_usage_and_exit(number_of_pages=None):
    usage = "Usage: split.py input.pdf split_page output1.pdf output2.pdf"
    print(usage)
    if number_of_pages is not None:
        print(f"Error: split_page must be between 1 and {number_of_pages - 1}.")
    sys.exit(1)

if len(sys.argv) != 5:
    print_usage_and_exit()

# Over či je split_page celé číslo
input_pdf = sys.argv[1]
try:
    split_page = int(sys.argv[2])
except ValueError:
    print("Error: split_page must be an integer.")
    sys.exit(1)
output1 = sys.argv[3]
output2 = sys.argv[4]

# Over či je input.pdf platný PDF súbor
try:
    reader = PdfReader(input_pdf)
except Exception as e:
    print(f"Error: Cannot open {input_pdf}: {e}")
    sys.exit(1)

number_of_pages = len(reader.pages)

# Over či input.pdf má aspoň 2 strany 
if number_of_pages < 2:
    print("Error: PDF must have at least 2 pages to be split.")
    sys.exit(1)
if not (1 <= split_page or split_page < number_of_pages):
    print_usage_and_exit(number_of_pages)

# First output: pages 0 to split_page-1
writer1 = PdfWriter()
for i in range(0, split_page):
    writer1.add_page(reader.pages[i])
with open(output1, "wb") as f1:
    writer1.write(f1)

# Second output: pages split_page to end
writer2 = PdfWriter()
for i in range(split_page, number_of_pages):
    writer2.add_page(reader.pages[i])
with open(output2, "wb") as f2:
    writer2.write(f2)